<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('senha');
            $table->integer('telefone');
            $table->date('data_nascimento');
            $table->bigInteger('CPF');
            $table->integer('RG');
            $table->date('data_expedicao');
            $table->string('orgao_expedidor');
            $table->string('estado_civil');
            $table->string('categoria');
            $table->string('empresa_atual');
            $table->string('profissao');
            $table->integer('renda_bruta');
            $table->integer('cep');
            $table->string('logradouro');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
