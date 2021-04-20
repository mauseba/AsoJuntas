<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCensoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censo', function (Blueprint $table) {
            $table->id();
            $table->string('barrio');
            $table->string('direccion');
            $table->string('tipo_vivienda');
            $table->string('energia');
            $table->string('gas');
            $table->string('agua');
            $table->string('alcantarilla');
            $table->string('escrituras');
            $table->string('sisben');
            $table->string('sub_vivienda');
            $table->string('sub_gobierno');
            $table->string('piso');
            $table->string('techo');
            $table->string('pañete');
            $table->string('baños');
            $table->string('baño_nuevo');
            $table->string('vivienda_nueva');

            $table->unsignedBigInteger('user_id'); //relacion con usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // llave foranea

            $table->timestamps();
        });
        Schema::create('barrios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
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
        Schema::dropIfExists('censo');
    }
}
