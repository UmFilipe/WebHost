<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainHost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        //php artisan make:migration alter_turma --table=turma
        Schema::create('domain_host', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id')->unsigned()->nullable()->constrained('domains');
            $table->foreignId('host_id')->unsigned()->nullable()->constrained('hosts');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domain_host', function (Blueprint $table) {
            //
        });
    }
}
