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
            $table->integer("formulario_id")->nullable();
            $table->longText("pregunta")->nullable();
            $table->longText("tipodecomponente")->nullable();
            $table->integer("numerodecomponente")->nullable();
            $table->longText("valordecomponente")->nullable();
            $table->boolean("campoobligatorio")->nullable();
            $table->integer("ordenpreguntas")->nullable();
            $table->integer("ordencomponentes")->nullable();
            $table->integer("maxdecaracteres")->nullable();
            $table->integer("mindecaracteres")->nullable();
            $table->string("tipodedatos")->nullable();
            $table->boolean("asignarpuntuacion")->nullable();            
            $table->string("estado")->nullable();
            $table->string("etiqueta")->nullable();
            $table->string("adicional")->nullable();
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
