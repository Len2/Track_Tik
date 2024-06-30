<?php

namespace Database\Seeders;

use App\Models\Provider1Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Provider1EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider1Employees = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'john.doe1@example.com',
                'username' => 'johndoe1',
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'email' => 'jane.smith@example.com',
                'username' => 'janesmith',
            ],
            [
                'name' => 'Bob',
                'surname' => 'Johnson',
                'email' => 'bob.johnson@example.com',
                'username' => 'bobjohnson',
            ],
            [
                'name' => 'Alice',
                'surname' => 'Brown',
                'email' => 'alice.brown@example.com',
                'username' => 'alicebrown',
            ],
            [
                'name' => 'Charlie',
                'surname' => 'Davis',
                'email' => 'charlie.davis@example.com',
                'username' => 'charliedavis',
            ],
        ];

        Provider1Employee::insert($provider1Employees);
    }
}
