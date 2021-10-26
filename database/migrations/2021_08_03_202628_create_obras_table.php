<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id('id');    // las pk son unicamente bigint
            $table->string('NombreObra',60)->unique();
            $table->double('MedidaArea')->nullable();
            $table->double('MedidaPerimetro')->nullable();
            $table->double('CondicionDesnivel')->nullable();
            $table->enum('TipoMaterialSuelo', array('Cemento', 'Asfalto'));
            $table->string('DetalleCondicionPiso',300)->nullable();
            $table->boolean('EstadoVerificacion')->default(false);
            $table->string('DireccionObra',40);
            $table->string('DatosAdicionales',255)->nullable();
            $table->enum('EstadoObra',array('Activa','Terminada','Sin Iniciar','Cancelada'))->default('Sin Iniciar');
            $table->unsignedTinyInteger('tipo_obra_id');
            $table->unsignedInteger('cliente_id');
            $table->unsignedTinyInteger("city_id");

            $table->foreign('tipo_obra_id')
                ->references('id')->on('tipo_obras');
            $table->foreign("city_id")
                ->references("id")->on("cities");
            $table->foreign("cliente_id")
                ->references("id")->on("clientes");

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
        Schema::dropIfExists('obras');
    }
}
