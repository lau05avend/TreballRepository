<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_obras', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();   // otros tipos de datos para la llave primaria
            // $table->id();
            $table->string('TipoObra',50)->unique();
            $table->string('DescripcionTO',300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_obras');
    }
}
