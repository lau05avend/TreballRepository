<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenos', function (Blueprint $table) {
           $table->unsignedInteger('id')->autoIncrement();

            $table->string("ImagenPlano",120);
            $table->string("ObservacionDiseno",350)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger("obra_id");

            $table->foreign("obra_id")
            ->references("id")->on("obras");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disenos');
    }
}
