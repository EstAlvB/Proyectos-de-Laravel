<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();

            //Llave foránea que referencia a los países
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')
                    ->references('id')->on('pais')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('nombre');
            $table->string('cod_provincia');

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
        Schema::dropIfExists('provincias');
    }
}
