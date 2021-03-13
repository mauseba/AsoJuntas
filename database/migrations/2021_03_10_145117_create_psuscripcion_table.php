<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsuscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psuscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('Mes');
            $table->string('tipo');

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
