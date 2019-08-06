<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('rut');
            $table->integer('edad');
            $table->enum('genero',['Masculino','Femenino'])->default('Masculino');
            $table->enum('licencia',['Si','No'])->default('Si');
            $table->enum('certificado',['Si','No'])->default('Si');
            $table->enum('status',['Activo','Reposo','Retirado'])->default('Activo');
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
        Schema::dropIfExists('choferes');
    }
}
