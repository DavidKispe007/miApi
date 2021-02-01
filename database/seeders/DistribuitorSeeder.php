<?php

namespace Database\Seeders;

use App\Models\Distribuitor;
use Illuminate\Database\Seeder;

class DistribuitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distribuitor::create([
            'name' => 'Market',
        ]);
        Distribuitor::create([
            'name' => 'Tienda',
        ]);
    }
}
