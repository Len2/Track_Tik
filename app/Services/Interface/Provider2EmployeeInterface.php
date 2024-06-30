<?php

namespace App\Services\Interface;

use App\Models\Provider2Employee;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface Provider2EmployeeInterface
{
    public function store(Request $request);
    public function index():LengthAwarePaginator;
    public function show(Provider2Employee $employee): Provider2Employee;
    public function update(Request $request, Provider2Employee $employee);
    public function destroy(Provider2Employee $employee): bool;
}
