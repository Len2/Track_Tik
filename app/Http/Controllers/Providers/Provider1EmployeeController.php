<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Models\Provider1Employee;
use App\Services\Provider1EmployeeService;
use App\Services\TrackTikAuthenticateService;
use App\Services\TrackTikService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class Provider1EmployeeController
 * @package App\Http\Controllers\Providers
 */
class Provider1EmployeeController extends Controller
{

    protected TrackTikService $trackTikService;
    protected Provider1EmployeeService $provider1EmployeeService;
    protected TrackTikAuthenticateService $trackTikAuthenticateService;

    public function __construct(TrackTikService $trackTikService, Provider1EmployeeService $provider1EmployeeService, TrackTikAuthenticateService $trackTikAuthenticateService)
    {
        $this->trackTikService = $trackTikService;
        $this->provider1EmployeeService = $provider1EmployeeService;
        $this->trackTikAuthenticateService = $trackTikAuthenticateService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $employee = $this->provider1EmployeeService->store($request);
        return response()->json($employee, $employee->getStatusCode());
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $employees = $this->provider1EmployeeService->index();
        return response()->json($employees);
    }

    /**
     * Display the specified resource.
     *
     * @param Provider1Employee $employee
     * @return JsonResponse
     */
    public function show(Provider1Employee $employee): JsonResponse
    {
        return response()->json($this->provider1EmployeeService->show($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Provider1Employee $employee
     * @return JsonResponse
     */
    public function update(Request $request, Provider1Employee $employee): JsonResponse
    {
        return response()->json($this->provider1EmployeeService->update($request, $employee), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Provider1Employee $employee
     * @return JsonResponse
     */
    public function destroy(Provider1Employee $employee): JsonResponse
    {
        $this->provider1EmployeeService->destroy($employee);
        return response()->json(null, 204);
    }
}
