<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedads', function (Blueprint $table) {

            $table->unsignedInteger('id')->autoIncrement();
            $table->string('AsuntoNovedad', 70);
            $table->enum("EstadoNovedad", array("Sin atender", "Atendida", "En espera"))->default('Sin atender');
            $table->string('DescripcionN', 355);
            $table->enum("isActive",array('Active', 'Inactive'))->default('Active');
            $table->unsignedTinyInteger('tipo_novedad_id');
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->unsignedInteger('cliente_id')->nullable();

            $table->foreign('tipo_novedad_id')
                ->references('id')->on('tipo_novedads');

            $table->foreign('actividad_id')
                ->references('id')->on('actividads');

            $table->foreign('empleado_id')
                ->references('id')->on('empleados');

            $table->foreign('cliente_id')
                ->references('id')->on('clientes');

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
        Schema::dropIfExists('novedads');
    }
}
