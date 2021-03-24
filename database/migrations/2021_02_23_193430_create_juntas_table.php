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
            $table->date('FechaC');
            $table->string('Nit',20);
            $table->string('Direccion',50)->nullable();
            $table->string('Nombre', 50);

            $table->string('D_Recibopago');
            $table->string('D_NIT');
            $table->string('D_Resolucion');
            $table->enum('status',[1,2])->default(1);
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
