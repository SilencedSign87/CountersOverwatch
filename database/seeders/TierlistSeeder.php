<?php

namespace Database\Seeders;

use App\Models\tierlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TierlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tierlist::create(
            [
                'nombre' => 'Season 12',
                'descripcion' => 'Tier 12 de la temporada'
            ],
        );

    }
}
