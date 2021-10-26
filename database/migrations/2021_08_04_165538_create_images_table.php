<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('archivo', 80);
            $table->string('modelo_id');
            $table->string('modelo_type');
            $table->longText('descripcion')->nullable();
            $table->unsignedBigInteger('obra_id')->nullable();

            $table->foreign("obra_id")
                ->references("id")->on("obras")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
