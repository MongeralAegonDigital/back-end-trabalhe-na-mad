<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('cpf')->primary();
            $table->string('nome', 100);
            $table->string('senha', 256);
            $table->string('telefone', 15);
            $table->string('email', 150)->unique();
            $table->date('dataNascimento');

            $table->string('cep', 9);
            $table->string('logradouro', 100);
            $table->string('numero', 10);
            $table->string('complemento', 100);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('uf', 2);

            $table->char('rg', 4);
            $table->string('numeroRg', 9);
            $table->date('dataRg');
            $table->string('orgaoRG', 15);
            $table->string('estadoCivil', 10);
            $table->string('categoria', 15);
            $table->string('empresa', 50);
            $table->text('proficao', 50)->nullable();
            $table->double('renda');
            
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
