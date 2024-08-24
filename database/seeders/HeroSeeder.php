<?php

namespace Database\Seeders;

use App\Models\hero;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear algunos héroes
        $hero1 = hero::create(['nombre' => 'Mauga', 'rol' => 'tank','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/9ee3f5a62893091d575ec0a0d66df878597086374202c6fc7da2d63320a7d02e.png']);
        $hero2 = hero::create(['nombre' => 'Dva', 'rol' => 'tank','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/ca114f72193e4d58a85c087e9409242f1a31e808cf4058678b8cbf767c2a9a0a.png']);
        $hero3 = hero::create(['nombre' => 'Cassidy', 'rol' => 'dps','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/6cfb48b5597b657c2eafb1277dc5eef4a07eae90c265fcd37ed798189619f0a5.png']);
        $hero4 = hero::create(['nombre' => 'Tracer', 'rol' => 'dps','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/a66413200e934da19540afac965cfe8a2de4ada593d9a52d53108bb28e8bbc9c.png']);
        $hero5 = hero::create(['nombre' => 'Ana', 'rol' => 'supp','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/3429c394716364bbef802180e9763d04812757c205e1b4568bc321772096ed86.png']);
        $hero6 = hero::create(['nombre' => 'Kiriko', 'rol' => 'supp','img_path'=>'https://d15f34w2p8l1cc.cloudfront.net/overwatch/088aff2153bdfa426984b1d5c912f6af0ab313f0865a81be0edd114e9a2f79f9.png']);
        
        // Establecer relaciones de counter
        $hero1->counters()->attach([$hero2->id, $hero6->id]);
        $hero2->counters()->attach([$hero3->id, $hero4->id]);
        $hero3->counters()->attach([$hero6->id, $hero5->id]);
        $hero4->counters()->attach([$hero5->id, $hero1->id]);
        $hero5->counters()->attach([$hero1->id, $hero2->id]);
        $hero6->counters()->attach([$hero4->id, $hero1->id]);

        // Imprimir información para verificar
        $this->command->info('Héroes creados y relaciones de counter establecidas:');
        hero::all()->each(function ($hero) {
            $this->command->info("{$hero->nombre} contrarresta a: " . $hero->counters->pluck('nombre')->implode(', '));
            $this->command->info("{$hero->nombre} es contrarrestado por: " . $hero->counteredBy->pluck('nombre')->implode(', '));
            $this->command->info('---');
        });
    }
}
