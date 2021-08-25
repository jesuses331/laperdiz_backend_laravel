<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('detalle');
            $table->unsignedBigInteger('raza_id');
            $table->unsignedBigInteger('etapa_id');

            $table->foreign('raza_id')->references('id')
                ->on('razas')->delete('cascade');
            
            $table->foreign('etapa_id')->references('id')
                ->on('etapas')->delete('cascade');


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
        Schema::dropIfExists('mascotas');
    }
}
