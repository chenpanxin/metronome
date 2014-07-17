<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {

    public function up()
    {
        Schema::create('replies', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('topic_id')->index();
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
