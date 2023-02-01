<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubforumTable extends Migration
{
    public function up()
    {
        Schema::create('user_subforum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subforum_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subforum_id')->references('id')->on('subforums')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_subforum');
    }
}


