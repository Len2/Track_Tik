<?php

namespace Database\Seeders;

use App\Models\MappingProvider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('employe_payload')->truncate();
        DB::table('provider1_employees')->truncate();
        DB::table('provider2_employees')->truncate();
        DB::table('mapping_providers')->truncate();
        DB::table('credentials')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            EmployPayloadSeeder::class,
            Provider1EmployeeSeeder::class,
            Provider2EmployeeSeeder::class,
            MappingProvidersSeeder::class,
            CredentialsSeeder::class,
        ]);
    }
}
