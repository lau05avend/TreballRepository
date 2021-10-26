<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccions', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string("NombreSeccion",60);
            $table->float("AreaSeccion");
            $table->float("PerimetroSec");
            $table->unsignedTinyInteger("color_id")->nullable();
            $table->unsignedInteger("diseno_id");

            $table->foreign("color_id")
            ->references("id")->on("colors");

            $table->foreign("diseno_id")
            ->references("id")->on("disenos")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccions');
    }
}
