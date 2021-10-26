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
            $table->dateTime('FechaExpiracion');
            $table->enum("EstadoPlanilla", array("vigente","vencida"))->default('vigente');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign("usuario_id")
            ->references("id")->on("usuarios");

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
