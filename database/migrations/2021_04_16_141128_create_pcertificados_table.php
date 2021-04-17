<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcertificados', function (Blueprint $table) {
            $table->id();
            $table->date('FechaP');
            $table->string('junta');
            $table->string('Nit');
            $table->string('Resolucion');
            $table->string('nombre');
            $table->string('Direccion');
            $table->string('Tdocumento');
            $table->string('Documento');
            $table->string('Expedido');
            $table->string('tipo');
            $table->string('Comprobante');
            $table->string('Observaciones',200)->default('Ninguna')->nullable();
            $table->string('Estado');

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
        Schema::dropIfExists('pcertificados');
    }
}
