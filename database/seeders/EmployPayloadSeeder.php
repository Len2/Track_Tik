<?php

namespace Database\Seeders;

use App\Models\EmployePayload;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployPayloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payloads = [
            ['name' => 'jobTitle', 'data_type' => 'string'],
            ['name' => 'region', 'data_type' => 'integer'],
            ['name' => 'password', 'data_type' => 'string'],
            ['name' => 'employmentProfile', 'data_type' => 'integer'],
            ['name' => 'gender', 'data_type' => 'string'],
            ['name' => 'birthday', 'data_type' => 'date'],
            ['name' => 'externalIds', 'data_type' => 'array'],
            ['name' => 'externalIdObject', 'data_type' => 'object'],
            ['name' => 'address', 'data_type' => 'integer'],
            ['name' => 'language', 'data_type' => 'string'],
            ['name' => 'fax', 'data_type' => 'string'],
            ['name' => 'customId', 'data_type' => 'string'],
            ['name' => 'firstName', 'data_type' => 'string'],
            ['name' => 'lastName', 'data_type' => 'string'],
            ['name' => 'primaryPhone', 'data_type' => 'string'],
            ['name' => 'secondaryPhone', 'data_type' => 'string'],
            ['name' => 'username', 'data_type' => 'string'],
            ['name' => 'email', 'data_type' => 'string'],
            ['name' => 'tags', 'data_type' => 'array'],
        ];


        EmployePayload::insert($payloads);
    }
}
