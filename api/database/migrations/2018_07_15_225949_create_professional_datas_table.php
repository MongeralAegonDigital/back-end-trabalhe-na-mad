<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_datas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('rg', 12);
            $table->unsignedInteger('number');
            $table->string('issuing_agency', 200);
            $table->string('actual_job', 200)->nullable();
            $table->string('profession', 200);
            $table->decimal('gross_income', 10, 2);
            $table->unsignedInteger('marital_status_id');
            $table->unsignedInteger('work_category_id');
            $table->string('client_cpf');
            
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('work_category_id')->references('id')->on('work_categories');
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
        Schema::dropIfExists('professional_datas');
    }
}
