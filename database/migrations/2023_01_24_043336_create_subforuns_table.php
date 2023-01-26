<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubforunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subforuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id')->constrained('professores');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->string('titulo');
            $table->string('texto');
            $table->boolean('ativo')->default(True);
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
        Schema::dropIfExists('subforuns');
    }
}
