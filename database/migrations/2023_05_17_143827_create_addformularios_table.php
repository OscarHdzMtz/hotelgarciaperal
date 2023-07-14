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
        Schema::create('addformularios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('img')->nullable();
            $table->string('etiqueta')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('tipoletratitulo')->nullable();
            $table->string('tamanoletratitulo')->nullable();
            $table->string('colorletratitulo')->nullable();
            $table->string('colorfondotitulo')->nullable();                                                               
            $table->string('textodespedidamodal')->nullable();
            $table->string('imagenFooter')->nullable();
            $table->string('WidthImagenFooter')->nullable();
            $table->string('heightImagenFooter')->nullable();            
            $table->string('textoFooter')->nullable();
            $table->string('tamaniotextoFooter')->nullable();
            $table->string('copyright')->nullable();         
            $table->string('textoadicional')->nullable();            
            $table->string('redireccionarbotonmodal')->nullable();            
            $table->integer('orden')->nullable();
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
        Schema::dropIfExists('addformularios');
    }
};
