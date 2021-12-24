<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('RG');
            $table->integer('number');
            $table->date('ship_date');
            $table->date('issuing_body'); //orgao expedidor
            $table->date('marital_status'); //estado civil
            $table->foreignId('category_id')->constrained('categories');
            $table->string('company')->nullable();
            $table->string('profession');
            $table->string('salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_data');
    }
}
