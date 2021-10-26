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
            $table->string("ContrasenaC",22);
            $table->string("CorreoCliente",50);
            $table->unsignedInteger("NumCelular");
            $table->unsignedInteger("NumTelefono");
            $table->unsignedTinyInteger("tipo_cliente_id");
            $table->unsignedTinyInteger("tipo_identificacion_id");
            $table->string("FotoL")->nullable();


            $table->foreign('tipo_cliente_id')
            ->references('id')->on('tipo_clientes');

            $table->foreign('tipo_identificacion_id')
            ->references('id')->on('tipo_identificacions');

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
