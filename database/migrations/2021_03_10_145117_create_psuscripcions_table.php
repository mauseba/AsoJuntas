<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsuscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psuscripcions', function (Blueprint $table) {
            $table->id();
            $table->date('FechaP');
            $table->string('Mes');
            $table->string('tipo');
            //$tabe->bigint('valor')
            $table->string('Comprobante');
            $table->string('Observaciones',200)->default('Ninguna')->nullable();


            $table->unsignedBigInteger('junta_id'); 
            $table->foreign('junta_id')->references('id')->on('juntas')->onDelete('cascade');

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
        Schema::dropIfExists('psuscripcion');
    }
}
