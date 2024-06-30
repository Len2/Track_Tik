<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Models\Provider2Employee;
use App\Services\Provider2EmployeeService;
use App\Services\TrackTikService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class Provider2EmployeeController extends Controller
{

    protected TrackTikService $trackTikService;
    protected Provider2EmployeeService $provider2EmployeeService;
    public function __construct(TrackTikService $trackTikService, Provider2EmployeeService $provider2EmployeeService)
    {
        $this->trackTikService = $trackTikService;
        $this->provider2EmployeeService = $provider2EmployeeService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $employee= $this->provider2EmployeeService->store($request);
        return response()->json($employee,$employee->getStatusCode());
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $employees= $this->provider2EmployeeService->index();
        return response()->json($employees);
    }

    /**
     * Display the specified resource.
     *
     * @param  Provider2Employee  $employee
     * @return JsonResponse
     */
    public function show(Provider2Employee $employee): JsonResponse
    {
        return response()->json($this->provider2EmployeeService->show($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Provider2Employee  $employee
     * @return JsonResponse
     */
    public function update(Request $request, Provider2Employee $employee): JsonResponse
    {
        return response()->json($this->provider2EmployeeService->update($request, $employee), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Provider2Employee  $employee
     * @return JsonResponse
     */
    public function destroy(Provider2Employee $employee): JsonResponse
    {
        $this->provider2EmployeeService->destroy($employee);
        return response()->json(null, 204);
    }
}
