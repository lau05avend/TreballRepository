<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id('id');
            $table->string('DescripcionMat',300);
            $table->unsignedTinyInteger('color_id')->nullable();
            $table->unsignedTinyInteger('tipo_material_id');

            $table->foreign("color_id")
            ->references("id")->on("colors");

            $table->foreign("tipo_material_id")
                ->references("id")->on("tipo_materials");

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
        Schema::dropIfExists('materials');
    }
}
