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
            $table->increments('id');
            
            $table->bigInteger('user_cpf');
            $table->integer('cep');
            $table->string('street');
            $table->string('number');
            $table->string('address2');
            $table->string('neighbor');
            $table->string('city');
            $table->string('state');

            $table->timestamps();
        });

        Schema::table('addresses', function(Blueprint $table) {
            $table->foreign('user_cpf', 'fk_user_address')->on('users')->references('cpf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table) {
            $table->dropForeign('fk_user_address');
        });

        Schema::dropIfExists('addresses');
    }
}
