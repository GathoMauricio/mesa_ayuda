<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigInteger('rol_id')->nullable();
            $table->bigInteger('cliente_id')->nullable();
            $table->boolean('status')->default(1);
            $table->string('nombre');
            $table->string('apaterno')->nullable();
            $table->string('amaterno')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_emergencia')->nullable();
            $table->string('email')->unique();
            $table->text('direccion')->nullable();
            $table->string('password');
            $table->string('imagen')->default('perfil.png');
            $table->string('api_token')->nullable();
            $table->softDeletes();
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
