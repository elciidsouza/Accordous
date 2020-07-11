<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id_contrato');
            $table->uuid('uuid');
            $table->string('tipo_pessoa', 40);
            $table->string('documento', 40);
            $table->string('email_contratante', 150);
            $table->string('nome_completo', 150);
            $table->string('validado', 50)->default('0');
            $table->unsignedBigInteger('imoveis_id')->unique();
            $table->foreign('imoveis_id')->references('id_imoveis')->on('imoveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
