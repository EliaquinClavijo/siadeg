<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('idarticulo');
            $table->unsignedInteger('idcategoria');
            $table->foreign('idcategoria')->references('idcategoria')->on('categoria');
            $table->string('codpro',20)->unique();
            $table->string('nombre',40)->unique();
            $table->string('descr',200);
            $table->integer('stock')->unsigned();
            $table->decimal('precio',10,2);
            $table->integer('porcent')->unsigned();
            $table->boolean('estado');
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
        
        Schema::dropIfExists('articulos');
    }
}
