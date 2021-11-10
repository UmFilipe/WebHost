<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class servers extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");
        foreach (range(1, 10) as $index) {
            DB::table('servers')->insert([
                'tipo' => $faker->word(),
                'preco' => $faker->buildingNumber(),
                'descricao' => $faker->word()
            ]);
        }
    }
}
