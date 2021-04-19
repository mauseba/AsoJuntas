<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('tipo_doc');
            $table->integer('numero');
            $table->integer('edad');
            $table->string('genero');
            $table->string('nucleo_fam'); // tipo de nucleo familiar (conyuge,hijo,padre/madre)
            $table->string('sub_gobierno'); // tipo de subsidio que recibe
            $table->string('tipo_salud'); // Subsidio, contributivo
            $table->string('salud'); // EPS
            $table->string('barrio'); // Barrio
            $table->string('discap'); // Discapacidad
            $table->string('nivel_edu');


            $table->unsignedBigInteger('user_id'); //relacion con usuarios

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // llave foranea

            $table->timestamps();
        });
        Schema::create('eps', function (Blueprint $table) {
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
        Schema::dropIfExists('beneficiarios');
    }
}
