<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainHostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domain_host')->insert([
            'domain_id' => 1,
            'host_id' => 2,
        ]);
        DB::table('domain_host')->insert([
            'domain_id' => 2,
            'host_id' => 2,
        ]);
        DB::table('domain_host')->insert([
            'domain_id' => 3,
            'host_id' => 2,
        ]);
        DB::table('domain_host')->insert([
            'domain_id' => 1,
            'host_id' => 7,
        ]);
        DB::table('domain_host')->insert([
            'domain_id' => 2,
            'host_id' => 7,
        ]);
    }
}
