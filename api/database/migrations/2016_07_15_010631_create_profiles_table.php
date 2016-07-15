<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigInteger('client_cpf')->primary();
            $table->string('rg', 4);
            $table->string('numeroRg', 9);
            $table->date('dataRg');
            $table->string('orgaoRg', 15);
            $table->string('estadoCivil', 10);
            $table->string('categoria', 15);
            $table->string('empresa', 50)->nullable();
            $table->string('profissao', 50);
            $table->decimal('renda', 15,2);

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
        Schema::drop('profiles');
    }
}
