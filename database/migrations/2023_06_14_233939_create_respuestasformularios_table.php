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
        Schema::create('respuestasformularios', function (Blueprint $table) {
            $table->id();
            $table->string("wireidporregistro");
            $table->string("wireidporpregunta");
            $table->integer("formulario_id");            
            $table->integer("pregunta_id");
            $table->longText("respuesta")->nullable();            
            $table->string("direccionIPPublica")->nullable();
            $table->string("direccionIPLocal")->nullable(); 
            $table->string("ciudad")->nullable(); 
            $table->string("region")->nullable();
            $table->string("pais")->nullable(); 
            $table->string("latLong")->nullable(); 
            $table->string("direccionMac")->nullable(); 
            $table->string("correo")->nullable(); 
            $table->string("numCelular")->nullable(); 
            $table->string("tipoDeDispositivo")->nullable();
            $table->string("statusRegistro")->nullable();
            $table->boolean("status")->nullable();
            $table->string('adicional')->nullable();  
            $table->string("slug")->nullable();          
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
        Schema::dropIfExists('respuestasformularios');
    }
};
