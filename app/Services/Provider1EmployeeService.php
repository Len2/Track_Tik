<?php

namespace App\Services;
use App\Models\Provider1Employee;
use App\Services\Interface\Provider1EmployeeInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Provider1EmployeeService implements Provider1EmployeeInterface
{

    protected $trackTikService;
    public function __construct(TrackTikService $trackTikService)
    {
        $this->trackTikService = $trackTikService;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:provider1_employees,email',
            'username' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $employee = Provider1Employee::create($request->all());
            if ($employee) {
                $sendData= $this->trackTikService->sendEmployeeToTrackTik(1, $employee);
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
        return Provider1Employee::paginate(10);
    }


    public function show(Provider1Employee $employee): Provider1Employee
    {
        return $employee;
    }

    public function update(Request $request, Provider1Employee $employee)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'string',
            'surname' => 'string',
            'email' => 'email|unique:provider1_employees,email,'.$employee->id,
            'username' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $employee->update($request->all());
            if ($employee->tracktik_id) {
                return $this->trackTikService->updateEmployeeToTrackTik(1, $employee);
            }
            return $employee;
        } catch (Exception $e) {
            Log::error('Error updating employee: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while updating the employee'], 500);
        }
    }

    public function destroy(Provider1Employee $employee): bool
    {
        try {
            return $employee->delete();
        } catch (Exception $e) {
            Log::error('Error delete employee: ' . $e->getMessage());
            return false;
        }
    }
}
