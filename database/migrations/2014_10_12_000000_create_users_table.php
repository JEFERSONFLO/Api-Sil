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
            $table->id();
            $table->string('Usuario_dni')->nullable();
            $table->string('Usuario_apellidos')->nullable();
            $table->date('Usuario_fnacimiento')->nullable();
            $table->string('Usuario_sexo', 1)->nullable();
            $table->string('Usuario_direccion')->nullable();
            $table->string('Usuario_distrito')->nullable();
            $table->string('Usuario_provincia')->nullable();
            $table->string('Usuario_departamento')->nullable();
            $table->string('Usuario_celular')->nullable();
            $table->string('Usuario_status', 1)->nullable();
            $table->string('Usuario_foto')->nullable();
            $table->unsignedBigInteger('Rol_id');
            $table->foreign('Rol_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
