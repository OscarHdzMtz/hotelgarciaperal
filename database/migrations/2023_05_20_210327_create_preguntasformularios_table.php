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
            $table->integer('ordenpreguntas')->nullable();
            $table->string("estado")->nullable();            
            $table->string('tipoletrapregunta')->nullable();
            $table->integer('tamanioletrapregunta')->nullable();
            $table->string('colorletrapregunta')->nullable();
            $table->string('colorfondopregunta')->nullable();
            $table->string('colorfondocuerpopregunta')->nullable();
            $table->string('colorfondofondopregunta')->nullable();
            $table->string('tipoletrarespuesta')->nullable();
            $table->integer('tamanioletrarespuesta')->nullable();
            $table->string('colorletrarespuesta')->nullable();
            $table->string('colorfondorespuesta')->nullable();
            $table->string('colorfondocuerporespuesta')->nullable();
            $table->string('colorfondofondorespuesta')->nullable();
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
