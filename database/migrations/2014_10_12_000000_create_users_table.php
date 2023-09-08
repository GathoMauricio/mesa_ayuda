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
            $table->boolean('estatus')->default(1);
            $table->string('nombre');
            $table->string('apaterno')->nullable();
            $table->string('amaterno')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_emergencia')->nullable();
            $table->string('email')->unique();
            $table->text('direccion')->nullable();
            $table->string('password');
            $table->string('imagen')->default('perfil.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
