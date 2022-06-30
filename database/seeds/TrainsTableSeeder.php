<?php

use App\Train;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $azienda = [
            'Trenitalia',
            'Italo',
            'Trenord'
        ];

        Train::truncate();
        
        for ($i = 0; $i < 15; $i ++) { 
            $train = new Train();
            $train->azienda = $azienda[rand(0, count($azienda) - 1)];
            $train->stazione_partenza = $faker->state();
            $train->stazione_arrivo = $faker->state();
            $train->orario_partenza = $faker->date('Y-m-d');
            $train->orario_arrivo = $faker->date('Y-m-d');
            $train->codice_treno = $faker->randomNumber(5, true);
            $train->numero_carrozze = $faker->randomDigit();
            $train->in_orario = $faker->boolean();
            $train->cancellato = $faker->boolean();

            $train->save();
        }
    }
}
