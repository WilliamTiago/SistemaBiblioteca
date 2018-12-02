<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro', function (Blueprint $table) {
            $table->increments('livrocodigo');
            $table->string('livrotitulo');
            $table->integer('livroano');
            $table->integer('categoriacodigo');
            $table->integer('autorcodigo');
            $table->foreign('categoriacodigo')->references('categoriacodigo')->on('categoria'); 
            $table->foreign('autorcodigo')->references('autorcodigo')->on('autor'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro');
    }
}
