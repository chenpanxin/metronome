<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration {

    public function up()
    {
        Schema::create('tweets', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('retweet_id');
            $table->integer('rank');
            $table->string('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
