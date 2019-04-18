<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('codigo', 45);
            $table->string('val_avista_un', 50);
            $table->string('val_parcelado_un', 50);
            $table->string('val_avista_ata', 50)->nullable();
            $table->string('val_parcelado_ata', 50)->nullable();
            $table->string('descricao', 400)->nullable();
            $table->string('caracteristicas', 400)->nullable();
            $table->string('como_usar', 400)->nullable();
            $table->string('observacoes', 400)->nullable();
            $table->string('image', 200);
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('subcategoria_id');
            //$table->timestamps();
        });
        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
