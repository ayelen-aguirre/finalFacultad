<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('anio')->nullable();
            $table->bigInteger('materia_id')->unsigned();
            $table->foreign('materia_id')
                ->references('id')
                ->on('materias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('fecha')->nullable();
            $table->bigInteger('vocal1')->unsigned()->nullable(); 
            $table->foreign('vocal1')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('vocal2')->unsigned()->nullable();
            $table->foreign('vocal2')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->bigInteger('vocal3')->unsigned()->nullable();
            $table->foreign('vocal3')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('examens');
    }
}
