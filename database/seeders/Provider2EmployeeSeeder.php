<?php

namespace Database\Seeders;

use App\Models\Provider2Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Provider2EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider2Employees = [
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'contact_email' => 'michael.johnson@example.com',
                'full_name' => 'Michael Johnson',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Williams',
                'contact_email' => 'emily.williams@example.com',
                'full_name' => 'Emily Williams',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Miller',
                'contact_email' => 'david.miller@example.com',
                'full_name' => 'David Miller',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Wilson',
                'contact_email' => 'sarah.wilson@example.com',
                'full_name' => 'Sarah Wilson',
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Moore',
                'contact_email' => 'daniel.moore@example.com',
                'full_name' => 'Daniel Moore',
            ],
        ];

        Provider2Employee::insert($provider2Employees);
    }
}
