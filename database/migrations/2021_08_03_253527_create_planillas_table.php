<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id('id');
            $table->string('ArchivoPlanilla');
            $table->dateTime('FechaPlanilla');
            $table->dateTime('FechaExpiracion');
            $table->enum("EstadoPlanilla", array("vigente","vencida"))->default('vigente');
            $table->enum("isActive",array('Active', 'Inactive'))->default('Active');
            $table->unsignedBigInteger('empleado_id');

            $table->foreign("empleado_id")
            ->references("id")->on("empleados");

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
        Schema::dropIfExists('planillas');
    }
}
