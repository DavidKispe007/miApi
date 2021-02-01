<?php

namespace Database\Seeders;

use App\Models\Distribuitor;
use App\Models\District;
use App\Models\Ubication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(CategorySeeder::class);
        \App\Models\User::factory(5)->create();
        $this->call(DistribuitorSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(UbicationSeeder::class);
        $this->call(PresentationSeeder::class);
    }
}
