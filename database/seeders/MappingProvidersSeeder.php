<?php

namespace Database\Seeders;

use App\Models\MappingProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MappingProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prepareEmployForTrackTikAPIs = [
            // for provider 1
            [
                'provider_number' => 1,
                'column_tracktik_payload' => 'firstName',
                'column_name' => 'name',
            ],
            [
                'provider_number' => 1,
                'column_tracktik_payload' => 'lastName',
                'column_name' => 'surname',
            ],
            [
                'provider_number' => 1,
                'column_tracktik_payload' => 'email',
                'column_name' => 'email',
            ],
            [
                'provider_number' => 1,
                'column_tracktik_payload' => 'username',
                'column_name' => 'username',
            ],
            // for provider 2
            [
                'provider_number' => 2,
                'column_tracktik_payload' => 'firstName',
                'column_name' => 'first_name',
            ],
            [
                'provider_number' => 2,
                'column_tracktik_payload' => 'lastName',
                'column_name' => 'last_name',
            ],
            [
                'provider_number' => 2,
                'column_tracktik_payload' => 'email',
                'column_name' => 'contact_email',
            ],
            [
                'provider_number' => 2,
                'column_tracktik_payload' => 'username',
                'column_name' => 'full_name',
            ],

        ];

        MappingProvider::insert($prepareEmployForTrackTikAPIs);
    }
}
