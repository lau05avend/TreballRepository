<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoNovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_novedads', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('NombreTipoN',45)->unique();
            $table->string('DescripcionTipo',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_novedads');
    }
}
