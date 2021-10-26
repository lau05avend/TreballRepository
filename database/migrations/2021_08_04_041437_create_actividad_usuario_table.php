<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('actividad_id')
                ->references('id')->on('actividads')->onDelete('cascade');

            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')->onDelete('cascade');

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
        Schema::dropIfExists('actividad_usuario');
    }
}
