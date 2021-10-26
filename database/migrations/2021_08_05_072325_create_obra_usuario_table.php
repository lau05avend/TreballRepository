<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObraUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obra_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obra_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('obra_id')
                ->references('id')->on('obras')->onDelete('cascade');

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
        Schema::dropIfExists('_obra_usuario');
    }
}
