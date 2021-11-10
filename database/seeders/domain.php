<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class domain extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");
        foreach (range(1, 10) as $index) {
            DB::table('domains')->insert([
                'dominio' => $faker->safeEmailDomain(),
                'preco' => $faker->buildingNumber(),
                'descricao' => $faker->word()
            ]);
        }
}
}
