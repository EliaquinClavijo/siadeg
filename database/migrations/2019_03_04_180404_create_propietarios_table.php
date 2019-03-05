<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietario', function (Blueprint $table) {
            $table->increments('idpropietario');
            $table->string('nombre',50)->unique();
            $table->string('dni',20);
            $table->string('telefono',20);
            $table->string('email',50);
            $table->string('oficina',50);
            $table->string('observaciones',150);
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
        Schema::dropIfExists('propietarios');
    }
}
