<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class domainCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('domain_categorias')->insert(
                [
                    [
                        'nome' => "Sul-americano",
                        'sigla' => "SA",
                    ],
                    [
                        'nome' => "Americano",
                        'sigla' => "NA",
                    ],
                    [
                        'nome' => "Brasileiro",
                        'sigla' => "BR",
                    ],
                    [
                        'nome' => "Europeu",
                        'sigla' => "EU",
                    ],
                    [
                        'nome' => "Asiático",
                        'sigla' => "ASIA",
                    ],
                    [
                        'nome' => "Oceania",
                        'sigla' => "OCE",
                    ]
                ]

            );
    }
}
