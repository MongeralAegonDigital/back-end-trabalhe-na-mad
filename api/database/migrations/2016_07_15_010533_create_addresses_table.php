<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigInteger('client_cpf')->primary();
            $table->string('cep', 9);
            $table->string('logradouro', 100);
            $table->string('numero', 10)->default('S/N');
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->char('uf', 2);

            $table->foreign('client_cpf')->references('cpf')->on('clients');
            
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
        Schema::drop('addresses');
    }
}
