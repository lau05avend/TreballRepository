<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->unsignedInteger('id')->autoIncrement();
            $table->string("NombreCC",80)->unique();
            $table->unsignedBigInteger("NumIdentificacion")->unique();
            $table->string("ContrasenaC",255);
            $table->string("CorreoCliente",50);
            $table->unsignedInteger("NumCelular");
            $table->unsignedInteger("NumTelefono");
            $table->string("FotoL")->nullable();
            $table->enum("isActive",array('Active', 'Inactive'))->default('Active');
            $table->unsignedTinyInteger("tipo_cliente_id");
            $table->unsignedTinyInteger("tipo_identificacion_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamp("email_verified_at");

            $table->foreign('tipo_cliente_id')
            ->references('id')->on('tipo_clientes');

            $table->foreign('tipo_identificacion_id')
            ->references('id')->on('tipo_identificacions');

            $table->foreign('user_id')
            ->references('id')->on('users');

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
        Schema::dropIfExists('clientes');
    }
}
