<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialDisenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_diseno', function (Blueprint $table) {
            $table->id();
            $table->float('CantidadMaterial');
            $table->unsignedBigInteger('material_id');
            $table->unsignedInteger('diseno_id');

            $table->foreign('material_id')
                ->references('id')->on('materials')->onDelete('cascade');

            $table->foreign('diseno_id')
                ->references('id')->on('disenos')->onDelete('cascade');
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
        Schema::dropIfExists('material_diseno');
    }
}
