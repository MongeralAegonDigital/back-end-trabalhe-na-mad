<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_categorias', function (Blueprint $table) {
            $table->integer("produto_id");
            $table->foreign("produto_id")->references("id")->on("produtos")->onDelete('cascade');
            $table->integer("categoria_id");
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produtos_categorias');
    }
}
