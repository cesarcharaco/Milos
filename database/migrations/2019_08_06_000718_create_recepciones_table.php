<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_despacho');
            $table->string('num_guia_romana')->nullable();
            $table->string('kg_pesaje')->nullable();
            $table->string('hora_llegada')->nullable();
            $table->string('total_kg_entrega')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('status',['No ha Llegado','Recibido','Cancelado','Devuelto'])->default('No ha Llegado');
            
            $table->foreign('id_despacho')->references('id')->on('despachos')->onDelete('cascade');
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
        Schema::dropIfExists('recepciones');
    }
}
