<?php

namespace Database\Seeders;

use App\Models\Ubication;
use Illuminate\Database\Seeder;

class UbicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubication::create([
            'name' => 'Vitrína A',
        ]);
        Ubication::create([
            'name' => 'Vitrína B',
        ]);
        Ubication::create([
            'name' => 'Vitrína C',
        ]);
    }
}
