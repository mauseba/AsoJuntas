<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_juns', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('Tip_identificacion');
            $table->string('Num_identificacion');
            $table->string('Num_contacto');
            $table->string('Niv_educacion');
            $table->string('Correo');
            $table->string('Cargo');

            $table->unsignedBigInteger('junta_id');

            $table->foreign('junta_id')->references('id')->on('juntas');
            


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
        Schema::dropIfExists('user_juns');
    }
}
