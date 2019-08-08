<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_guia');
            $table->string('patente');
            $table->unsignedBigInteger('id_chofer');
            $table->string('kg_pesaje');
            $table->string('hora_salida');
            $table->string('total_kg_salida');
            $table->text('observaciones')->nullable();
            $table->date('fecha');

            $table->foreign('id_chofer')->references('id')->on('choferes')->onDelete('cascade');
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
        Schema::dropIfExists('despachos');
    }
}
