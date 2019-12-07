<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados_usuarios');
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
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
        Schema::dropIfExists('users');
    }
}
