<?php

namespace Database\Seeders;

use App\Models\Credential;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secret = [

            [
                'refresh_token' => env('TRACKTIK_TOKEN_REFRESH'),
                'access_token' => env('TRACKTIK_TOKEN'),
            ]
        ];

        Credential::insert($secret);
    }
}
