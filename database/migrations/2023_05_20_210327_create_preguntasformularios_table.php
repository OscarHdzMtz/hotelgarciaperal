<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntasformularios', function (Blueprint $table) {
            $table->id();
            $table->integer("formulario_id");
            $table->longText("pregunta");
            $table->longText("tipodecomponente");
            $table->integer("numerodecomponente");
            $table->string("valordecomponente");
            $table->boolean("campoobligatorio");
            $table->integer("ordenpreguntas");
            $table->integer("ordencomponentes");
            $table->integer("maxdecaracteres");
            $table->integer("mindecaracteres");
            $table->string("tipodedatos");
            $table->string("estado");
            $table->string("etiqueta");
            $table->string("adicional");
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
        Schema::dropIfExists('preguntasformularios');
    }
};
