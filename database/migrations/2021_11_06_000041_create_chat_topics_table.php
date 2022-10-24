<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('chat_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
