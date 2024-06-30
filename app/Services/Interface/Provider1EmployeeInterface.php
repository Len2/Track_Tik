<?php

namespace App\Services\Interface;

use App\Models\Provider1Employee;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface Provider1EmployeeInterface
{
    public function store(Request $request);
    public function index():LengthAwarePaginator;
    public function show(Provider1Employee $employee): Provider1Employee;
    public function update(Request $request, Provider1Employee $employee);
    public function destroy(Provider1Employee $employee): bool;
}
