<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('user_cpf');
            $table->integer('rg');
            $table->date('date_expedition');
            $table->string('org');
            $table->string('marital_status');
            $table->enum('category', ['Empregado', 'Empregador', 'Autônomo', 'Outros']);
            $table->string('company')->nullable();
            $table->string('occupation');
            $table->string('salary');
            
            $table->timestamps();
        });
        
        Schema::table('user_data', function(Blueprint $table) {
            $table->foreign('user_cpf', 'fk_user_data')->on('users')->references('cpf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_data', function(Blueprint $table) {
            $table->dropForeign('fk_user_data');
        });

        Schema::dropIfExists('user_data');
    }
}
