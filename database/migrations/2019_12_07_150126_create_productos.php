<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn')->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->double('precio',8,2);
            $table->string('archivo')->nullable();
            $table->string('imagen');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados_productos');
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
        Schema::dropIfExists('productos');
    }
}
