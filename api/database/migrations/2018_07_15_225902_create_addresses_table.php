<?php

use Illuminate\Support\Facades\Schema;
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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('cep', 10);
            $table->string('state', 255);
            $table->string('city', 255);
            $table->string('neighborhood', 255);
            $table->string('street', 255);
            $table->string('number',10);
            $table->string('complement',255);
            $table->string('client_cpf');
            
            $table->foreign('client_cpf')->references('cpf')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
