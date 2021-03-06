<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juntas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('FechaC');
            $table->string('Vereda', 50);
            $table->string('Nit',20);

            $table->string('D_recibo de pago');
            $table->string('D_NIT');
            $table->string('D_Resolucion');
            $table->enum('status',[1,2]);

            $table->string('Observaciones',200);
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
        Schema::dropIfExists('juntas');
    }
}
