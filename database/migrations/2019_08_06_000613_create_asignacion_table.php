<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_chofer');
            $table->unsignedBigInteger('id_camion');
            $table->enum('status',['Asignado','Retirado'])->default('Asignado');

            $table->foreign('id_chofer')->references('id')->on('choferes')->onDelete('cascade');
            $table->foreign('id_camion')->references('id')->on('camiones')->onDelete('cascade');
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
        Schema::dropIfExists('asignacion');
    }
}
