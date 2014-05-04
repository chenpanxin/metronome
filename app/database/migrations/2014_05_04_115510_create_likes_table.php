<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration {

    public function up()
    {
        Schema::create('likes', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('topic_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
