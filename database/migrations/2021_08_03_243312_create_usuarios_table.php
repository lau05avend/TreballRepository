<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id');
            $table->string("NombreUsuario", 50);
            $table->string("ApellidosUsuario", 50);
            $table->unsignedBigInteger("NumeroDocumento")->unique();
            $table->unsignedBigInteger("NumeCelular");
            $table->unsignedInteger("NumTelefono");
            $table->date("FechaNacimientoU");
            $table->string("CorreoUsuario",50);
            $table->enum("GeneroUsuario",array("Masculino","Femenino","Otro"));
            $table->string("FotoUsuario")->nullable();
            $table->string("DireccionUsuario",40);
            $table->unsignedTinyInteger("EdadU");
            $table->string("contrasena",22);
            $table->enum("Disponibilidad",array("Ocupado","No Disponible","Disponible"))->default('Disponible');
            $table->enum("EstadoUsuario",array('Activo', 'Inhabilitado'))->default('Activo');
            $table->unsignedTinyInteger("rol_id");
            $table->unsignedTinyInteger("tipo_identificacion_id");
            $table->unsignedTinyInteger("estado_civil_id");
            $table->unsignedTinyInteger("city_id");

            $table->foreign("rol_id")
                ->references("id")->on("rols");

            $table->foreign("tipo_identificacion_id")
                ->references("id")->on("tipo_identificacions");

            $table->foreign("estado_civil_id")
             ->references("id")->on("estado_civils");

             $table->foreign("city_id")
             ->references("id")->on("cities");

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
        Schema::dropIfExists('usuarios');
    }
}
