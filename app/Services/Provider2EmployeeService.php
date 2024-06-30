<?php

namespace App\Services;
use App\Models\Provider2Employee;
use App\Services\Interface\Provider2EmployeeInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Provider2EmployeeService implements Provider2EmployeeInterface
{

    protected $trackTikService;
    public function __construct(TrackTikService $trackTikService)
    {
        $this->trackTikService = $trackTikService;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact_email' => 'required|email|unique:provider2_employees,contact_email',
            'full_name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $employee = Provider2Employee::create($request->all());
            if ($employee) {
                $sendData= $this->trackTikService->sendEmployeeToTrackTik(2, $employee);
                if ($sendData->status() == 201) {
                    $employee->sendToTrackTik = true;
                    $employee->tracktik_id = $sendData->getData()->data->id;
                    $employee->save();
                }
                return $sendData;
            }
            return response()->json(['message' => 'Employee could not be created'], 500);
        } catch (Exception $e) {
            Log::error('Error creating employee: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while creating the employee'], 500);
        }
    }


    public function index():LengthAwarePaginator
    {
        return Provider2Employee::paginate(10);
    }


    public function show(Provider2Employee $employee): Provider2Employee
    {
        return $employee;
    }

    public function update(Request $request, Provider2Employee $employee)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'string',
            'last_name' => 'string',
            'contact_email' => 'email|unique:provider2_employees,contact_email,'.$employee->id,
            'full_name' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $employee->update($request->all());
            if ($employee->tracktik_id) {
                return $this->trackTikService->updateEmployeeToTrackTik(2, $employee);
            }
            return $employee;
        } catch (Exception $e) {
            Log::error('Error updating employee: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while updating the employee'], 500);
        }
    }

    public function destroy(Provider2Employee $employee): bool
    {
        try {
            return $employee->delete();
        } catch (Exception $e) {
            Log::error('Error delete employee: ' . $e->getMessage());
            return false;
        }
    }
}
