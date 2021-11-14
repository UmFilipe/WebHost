<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nome' => "Google",
            'cnpj' => "06.990.590/0001-23",
        ]);
        DB::table('empresas')->insert([
            'nome' => "Facebook",
            'cnpj' => "09.628.924/0001-01",
        ]);
        DB::table('empresas')->insert([
            'nome' => "Microsoft",
            'cnpj' => "60.316.817/0001-03",
        ]);
    }
}
