<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDomainEmpresaId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('domains', function (Blueprint $table) {
            $table->foreignId('empresa_id')->nullable()->unsigned()->constrained('empresas')->after('nome_arquivo');
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
        Schema::table('domains', function (Blueprint $table) {
            //
        });
    }
}
