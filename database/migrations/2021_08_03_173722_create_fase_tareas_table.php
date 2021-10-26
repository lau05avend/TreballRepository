<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaseTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fase_tareas', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('NombreFase',45)->unique();
            $table->string('DescripcionFase',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fase_tareas');
    }
}
