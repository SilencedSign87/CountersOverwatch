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
        // Tank
        $Dva = hero::create(['nota'=>'Fuerza matriz o Stuneala.','nombre' => 'Dva', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/ca114f72193e4d58a85c087e9409242f1a31e808cf4058678b8cbf767c2a9a0a.png']);
        $Doomfist = hero::create(['nota'=>'No disparar en bloqueo y Stunealo.','nombre' => 'Doomfist', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/13750471c693c1a360eb19d5ace229c8599a729cd961d72ebee0e157657b7d18.png']);
        $JunkerQueen = hero::create(['nota'=>' Bloquea sus heals con escudos, muros o habilidades.','nombre' => 'JunkerQueen', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/cef2406b2244b80506f83b8fb9ebaf214f41fa8795cbeef84026cd8018561d04.png']);
        $Mauga = hero::create(['nota'=>'Bloquea sus heals con escudos, muros o habilidades.','nombre' => 'Mauga', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/9ee3f5a62893091d575ec0a0d66df878597086374202c6fc7da2d63320a7d02e.png']);
        $Orisa = hero::create(['nota'=>'Fuerza habilidades.','nombre' => 'Orisa', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/71e96294617e81051d120b5d04b491bb1ea40e2933da44d6631aae149aac411d.png']);
        $Ramattra = hero::create(['nota'=>'No disparar en bloqueo.','nombre' => 'Ramattra', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/3e0367155e1940a24da076c6f1f065aacede88dbc323631491aa0cd5a51e0b66.png']);
        $Reinhardt = hero::create(['nota'=>'Rompe su escudo.','nombre' => 'Reinhardt', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/490d2f79f8547d6e364306af60c8184fb8024b8e55809e4cc501126109981a65.png']);
        $Roadhog = hero::create(['nota'=>'Mantente alejado de su gancho.','nombre' => 'Roadhog', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/72e02e747b66b61fcbc02d35d350770b3ec7cbaabd0a7ca17c0d82743d43a7e8.png']);
        $Sigma = hero::create(['nota'=>'Ataca de cerca.','nombre' => 'Sigma', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/cd7a4c0a0df8924afb2c9f6df864ed040f20250440c36ca2eb634acf6609c5e4.png']);
        $Winston = hero::create(['nota'=>'Dispare cuando salte a por alguien.','nombre' => 'Winston', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/bd9c8e634d89488459dfc1aeb21b602fa5c39aa05601a4167682f3a3fed4e0ee.png']);
        $WreckingBall = hero::create(['nota'=>' Ignóralo o Stunealo.','nombre' => 'Wrecking Ball', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/5c18e39ce567ee8a84078f775b9f76a2ba891de601c059a3d2b46b61ae4afb42.png']);
        $Zarya = hero::create(['nota'=>'Fuerza una burbuja y revienta la segunda.','nombre' => 'Zarya', 'rol' => 'tank', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/8819ba85823136640d8eba2af6fd7b19d46b9ee8ab192a4e06f396d1e5231f7a.png']);

        // Dps

        $Ashe = hero::create(['nota'=>'Héroes rápidos para saltar por ella.','nombre' => 'Ashe', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/8dc2a024c9b7d95c7141b2ef065590dbc8d9018d12ad15f76b01923986702228.png']);
        $Bastion = hero::create(['nota'=>'Evita el modo torreta.','nombre' => 'Bastion', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/4d715f722c42215072b5dd0240904aaed7b5285df0b2b082d0a7f1865b5ea992.png']);
        $Cassidy = hero::create(['nota'=>'Daño a distancia.','nombre' => 'Cassidy', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/6cfb48b5597b657c2eafb1277dc5eef4a07eae90c265fcd37ed798189619f0a5.png']);
        $Echo = hero::create(['nota'=>'Dispárale con Hitscans.','nombre' => 'Echo', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/f086bf235cc6b7f138609594218a8385c8e5f6405a39eceb0deb9afb429619fe.png']);
        $Genji = hero::create(['nota'=>'Usar rayos o daño de spam.','nombre' => 'Genji', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/4edf5ea6d58c449a2aeb619a3fda9fff36a069dfbe4da8bc5d8ec1c758ddb8dc.png']);
        $Hanzo = hero::create(['nota'=>'Héroes rápidos para saltar por el, no te asomes.','nombre' => 'Hanzo', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/aecd8fa677f0093344fab7ccb7c37516c764df3f5ff339a5a845a030a27ba7e0.png']);
        $Junkrat = hero::create(['nota'=>'Daño a distancia.','nombre' => 'Junkrat', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/037e3df083624e5480f8996821287479a375f62b470572a22773da0eaf9441d0.png']);
        $Mei = hero::create(['nota'=>'Fuerza habilidades.','nombre' => 'Mei', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/1533fcb0ee1d3f9586f84b4067c6f63eca3322c1c661f69bfb41cd9e4f4bcc11.png']);
        $Pharah = hero::create(['nota'=>'Héroes hitscan.','nombre' => 'Pharah', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/f8261595eca3e43e3b37cadb8161902cc416e38b7e0caa855f4555001156d814.png']);
        $Reaper = hero::create(['nota'=>'Héroes hitscan.','nombre' => 'Reaper', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/2edb9af69d987bb503cd31f7013ae693640e692b321a73d175957b9e64394f40.png']);
        $Sojourn = hero::create(['nota'=>'Evita su disparo secundario.','nombre' => 'Sojourn', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/a53bf7ad9d2f33aaf9199a00989f86d4ba1f67c281ba550312c7d96e70fec4ea.png']);
        $Soldado76 = hero::create(['nota'=>'Vigila que no flanquee.','nombre' => 'Soldado: 76', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/20b4ef00ed05d6dba75df228241ed528df7b6c9556f04c8070bad1e2f89e0ff5.png']);
        $Sombra = hero::create(['nota'=>'Héroes hitscan.','nombre' => 'Sombra', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/bca8532688f01b071806063b9472f1c0f9fc9c7948e6b59e210006e69cec9022.png']);
        $Symmetra = hero::create(['nota'=>'Destruye sus torretas.','nombre' => 'Symmetra', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/7f2024c5387c9d76d944a5db021c2774d1e9d7cbf39e9b6a35b364d38ea250ac.png']);
        $Torbjorn = hero::create(['nota'=>'Destruye sus torretas.','nombre' => 'Torbjörn', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/1309ab1add1cc19189a2c8bc7b1471f88efa1073e9705d2397fdb37d45707d01.png']);
        $Tracer = hero::create(['nota'=>'Fuerza habilidades.','nombre' => 'Tracer', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/a66413200e934da19540afac965cfe8a2de4ada593d9a52d53108bb28e8bbc9c.png']);
        $Venture = hero::create(['nota'=>'Atento cuando salga de tierra y stunealo.','nombre' => 'Venture', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/7e33dd756c8a1abca519af6c3bf26813f2f81d39885373539efcf8442c4bc647.png']);
        $Widowmaker = hero::create(['nota'=>'Héroes rápidos para saltar por ella.','nombre' => 'Widowmaker', 'rol' => 'dps', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/a714f1cb33cc91c6b5b3e89ffe7e325b99e7c89cc8e8feced594f81305147efe.png']);

        // Supp

        $Ana = hero::create(['nota'=>'Héroes rápidos para saltar por ella.','nombre' => 'Ana', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/3429c394716364bbef802180e9763d04812757c205e1b4568bc321772096ed86.png']);
        $Baptiste = hero::create(['nota'=>'Fuerza sus habilidades.','nombre' => 'Baptiste', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/f979896f74ba22db2a92a85ae1260124ab0a26665957a624365e0f96e5ac5b5c.png']);
        $Brigitte = hero::create(['nota'=>'Daño a distancia.','nombre' => 'Brigitte', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/48392820c6976ee1cd8dde13e71df85bf15560083ee5c8658fe7c298095d619a.png']);
        $Illari = hero::create(['nota'=>'Rompe su Pilon.','nombre' => 'Illari', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/5ea986038f9d307bd4613d5e6f2c4c8e7f15f30ceeeabbdd7a06637a38f17e1f.png']);
        $Juno = hero::create(['nota'=>'Héroes rápidos para saltar por ella','nombre' => 'Juno', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/585b2d60cbd3c271b6ad5ad0922537af0c6836fab6c89cb9979077f7bb0832b5.png']);
        $Kiriko = hero::create(['nota'=>'Fuerza sus habilidades.','nombre' => 'Kiriko', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/088aff2153bdfa426984b1d5c912f6af0ab313f0865a81be0edd114e9a2f79f9.png']);
        $Lifeweaver = hero::create(['nota'=>'Solo dispárale.','nombre' => 'Lifeweaver', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/39d4514f1b858bc228035b09d5a74ed41f8eeefc9a0d1873570b216ba04334df.png']);
        $Lucio = hero::create(['nota'=>'Usar rayos o daño de spam.','nombre' => 'Lúcio', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/e2ff2527610a0fbe0c9956f80925123ef3e66c213003e29d37436de30b90e4e1.png']);
        $Mercy = hero::create(['nota'=>'Solo dispárale.','nombre' => 'Mercy', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/2508ddd39a178d5f6ae993ab43eeb3e7961e5a54a9507e6ae347381193f28943.png']);
        $Moira = hero::create(['nota'=>'Héroes hitscan.','nombre' => 'Moira', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/000beeb5606e01497897fa9210dd3b1e78e1159ebfd8afdc9e989047d7d3d08f.png']);
        $Zenyatta = hero::create(['nota'=>'Evita su orbe de discordia.','nombre' => 'Zenyatta', 'rol' => 'supp', 'img_path' => 'https://d15f34w2p8l1cc.cloudfront.net/overwatch/71cabc939c577581f66b952f9c70891db779251e8e70f29de3c7bf494edacfe4.png']);



        // Establecer relaciones de counter

        // TANK
        $Mauga->counteredBy()->attach([$Sigma->id, $Dva->id, $Sojourn->id, $Tracer->id, $Widowmaker->id, $Ana->id, $Zenyatta->id]);
        $Dva->counteredBy()->attach([$Zarya->id, $Mei->id, $Sombra->id, $Symmetra->id, $Zenyatta->id, $Moira->id]);
        $Doomfist->counteredBy()->attach([$JunkerQueen->id, $Orisa->id, $Roadhog->id, $Cassidy->id, $Sombra->id, $Torbjorn->id, $Echo->id, $Ana->id, $Brigitte->id, $Zenyatta->id]);
        $JunkerQueen->counteredBy()->attach([$Zarya->id, $Orisa->id, $Sigma->id, $Dva->id, $Cassidy->id, $Echo->id, $Mei->id, $Pharah->id, $Ana->id, $Kiriko->id]);
        $Orisa->counteredBy()->attach([$Zarya->id, $Symmetra->id, $Sojourn->id, $Echo->id, $Zenyatta->id]);
        $Ramattra->counteredBy()->attach([$Mauga->id, $Orisa->id, $Echo->id, $Pharah->id, $Mei->id, $Bastion->id, $Symmetra->id, $Zenyatta->id, $Ana->id]);
        $Reinhardt->counteredBy()->attach([$Mauga->id, $JunkerQueen->id, $Orisa->id, $Ramattra->id, $Bastion->id, $Echo->id, $Mei->id, $Symmetra->id, $Baptiste->id, $Lucio->id]);
        $Roadhog->counteredBy()->attach([$Orisa->id, $Roadhog->id, $Mauga->id, $Reaper->id, $Sojourn->id, $Ana->id, $Zenyatta->id]);
        $Sigma->counteredBy()->attach([$Reinhardt->id, $Zarya->id, $Winston->id, $Ramattra->id, $Echo->id, $Pharah->id, $Mei->id, $Baptiste->id, $Lucio->id]);
        $Winston->counteredBy()->attach([$Orisa->id, $Roadhog->id, $Mauga->id, $Dva->id, $Bastion->id, $Reaper->id, $Torbjorn->id, $Tracer->id, $Brigitte->id, $Zenyatta->id]);
        $WreckingBall->counteredBy()->attach([$Orisa->id, $Roadhog->id, $Mauga->id, $Bastion->id, $Cassidy->id, $Sombra->id, $Ana->id, $Brigitte->id, $Lucio->id, $Zenyatta->id]);
        $Zarya->counteredBy()->attach([$Winston->id, $Zarya->id, $Reinhardt->id]);

        // DPS
        $Venture->counteredBy()->attach([$Zarya->id, $Roadhog->id, $Orisa->id, $Cassidy->id, $Venture->id, $Lucio->id, $Kiriko->id, $Moira->id]);
        $Ashe->counteredBy()->attach([$Sigma->id, $Dva->id, $Winston->id, $WreckingBall->id, $Widowmaker->id, $Hanzo->id, $Genji->id, $Kiriko->id, $Zenyatta->id]);
        $Bastion->counteredBy()->attach([$Dva->id, $Sigma->id, $Hanzo->id, $Genji->id, $Junkrat->id, $Illari->id, $Zenyatta->id, $Baptiste->id]);
        $Cassidy->counteredBy()->attach([$Dva->id, $Sigma->id, $Cassidy->id, $Sojourn->id, $Illari->id]);
        $Echo->counteredBy()->attach([$Dva->id, $Zarya->id, $Ashe->id, $Cassidy->id, $Bastion->id, $Soldado76->id, $Widowmaker->id, $Illari->id, $Baptiste->id]);
        $Genji->counteredBy()->attach([$Winston->id, $Zarya->id, $Echo->id, $Cassidy->id, $Sombra->id, $Torbjorn->id, $Symmetra->id, $Mei->id, $Moira->id, $Brigitte->id]);
        $Hanzo->counteredBy()->attach([$Dva->id, $Doomfist->id, $Winston->id, $WreckingBall->id, $Echo->id, $Genji->id, $Pharah->id, $Sojourn->id, $Kiriko->id, $Lucio->id]);
        $Junkrat->counteredBy()->attach([$Roadhog->id, $Sigma->id, $Winston->id, $Zarya->id, $Ashe->id, $Cassidy->id, $Pharah->id, $Echo->id, $Widowmaker->id, $Hanzo->id, $Baptiste->id, $Illari->id]);
        $Mei->counteredBy()->attach([$Zarya->id, $Winston->id, $Cassidy->id, $Echo->id, $Pharah->id, $Kiriko->id, $Lifeweaver->id, $Lucio->id]);
        $Pharah->counteredBy()->attach([$Dva->id, $Cassidy->id, $Ashe->id, $Soldado76->id, $Echo->id, $Baptiste->id, $Illari->id]);
        $Reaper->counteredBy()->attach([$Dva->id, $Orisa->id, $Sigma->id, $Zarya->id, $Bastion->id, $Cassidy->id, $Echo->id, $Pharah->id, $Sombra->id, $Kiriko->id, $Brigitte->id, $Lucio->id]);
        $Sojourn->counteredBy()->attach([$Dva->id, $Sigma->id, $Winston->id, $Zarya->id, $Cassidy->id, $Sojourn->id, $Illari->id]);
        $Soldado76->counteredBy()->attach([$Dva->id, $Sigma->id, $Winston->id, $Cassidy->id, $Sojourn->id, $Illari->id, $Baptiste->id]);
        $Sombra->counteredBy()->attach([$Dva->id, $Zarya->id, $Tracer->id, $Sombra->id, $Brigitte->id, $Illari->id]);
        $Symmetra->counteredBy()->attach([$Winston->id, $Zarya->id, $JunkerQueen->id, $Widowmaker->id, $Ashe->id, $Hanzo->id, $Cassidy->id, $Pharah->id, $Echo->id, $Illari->id, $Baptiste->id]);
        $Torbjorn->counteredBy()->attach([$Sigma->id, $Zarya->id, $Widowmaker->id, $Hanzo->id, $Ashe->id, $Echo->id, $Pharah->id, $Cassidy->id, $Soldado76->id, $Baptiste->id, $Illari->id, $Kiriko->id, $Zenyatta->id]);
        $Tracer->counteredBy()->attach([$Zarya->id, $Dva->id, $Tracer->id, $Torbjorn->id, $Cassidy->id, $Brigitte->id, $Illari->id, $Kiriko->id, $Moira->id]);
        $Widowmaker->counteredBy()->attach([$Dva->id, $Sigma->id, $Winston->id, $WreckingBall->id, $Hanzo->id, $Widowmaker->id, $Genji->id, $Sombra->id, $Kiriko->id, $Zenyatta->id]);

        // SUPP

        $Ana->counteredBy()->attach([$Dva->id, $Doomfist->id, $Winston->id, $WreckingBall->id, $Sombra->id, $Tracer->id, $Genji->id, $Kiriko->id, $Lucio->id, $Moira->id]);
        $Baptiste->counteredBy()->attach([$Dva->id, $Sigma->id, $Genji->id, $Widowmaker->id, $Lucio->id]);
        $Brigitte->counteredBy()->attach([$Dva->id, $Ramattra->id, $Ashe->id, $Cassidy->id, $Sojourn->id, $Pharah->id, $Echo->id, $Baptiste->id, $Illari->id]);
        $Illari->counteredBy()->attach([$Dva->id, $Sigma->id, $Winston->id, $Widowmaker->id, $Sojourn->id, $Genji->id, $Kiriko->id, $Lucio->id]);
        $Lifeweaver->counteredBy()->attach([$Dva->id, $WreckingBall->id, $Winston->id, $Doomfist->id, $Ashe->id, $Sojourn->id, $Tracer->id, $Sombra->id, $Echo->id, $Pharah->id, $Baptiste->id, $Lucio->id, $Illari->id, $Kiriko->id]);
        $Lucio->counteredBy()->attach([$Dva->id, $Zarya->id, $Winston->id, $Torbjorn->id, $Mei->id, $Pharah->id, $Moira->id, $Brigitte->id]);
        $Mercy->counteredBy()->attach([$Dva->id, $WreckingBall->id, $Winston->id, $Doomfist->id, $Ashe->id, $Sojourn->id, $Tracer->id, $Sombra->id, $Echo->id, $Pharah->id, $Baptiste->id, $Lucio->id, $Illari->id, $Kiriko->id]);
        $Moira->counteredBy()->attach([$Orisa->id, $Zarya->id, $Ashe->id, $Cassidy->id, $Torbjorn->id, $Sojourn->id, $Baptiste->id, $Kiriko->id, $Illari->id]);
        $Zenyatta->counteredBy()->attach([$Dva->id, $Sigma->id, $Sombra->id, $Tracer->id, $Genji->id, $Lucio->id, $Kiriko->id]);
        $Juno->counteredBy()->attach([$Dva->id, $Winston->id, $WreckingBall->id, $Doomfist->id, $Sombra->id, $Tracer->id, $Genji->id, $Lucio->id, $Moira->id]);

        // Imprimir información para verificar
        $this->command->info('Héroes creados y relaciones de counter establecidas:');
        hero::all()->each(function ($hero) {
            $this->command->info("{$hero->nombre} contrarresta a: " . $hero->counters->pluck('nombre')->implode(', '));
            $this->command->info("{$hero->nombre} es contrarrestado por: " . $hero->counteredBy->pluck('nombre')->implode(', '));
            $this->command->info('---');
        });
    }
}
