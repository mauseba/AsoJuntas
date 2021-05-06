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
        Schema::create('eps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

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

            $table->string('discap'); // Discapacidad
            $table->string('nivel_edu');


            $table->unsignedBigInteger('salud'); //relacion con eps
            $table->foreign('salud')->references('id')->on('eps')->onDelete('cascade'); // llave foranea


            $table->unsignedBigInteger('user_id'); //relacion con usuarios

            $table->foreign('user_id')->references('id')->on('user_juns')->onDelete('cascade'); // llave foranea

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
        Schema::dropIfExists('eps');
    }
}
