<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    public function up()
    {
        Schema::create('comments', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('topic_id');
            $table->text('content');
            $table->boolean('trashed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
