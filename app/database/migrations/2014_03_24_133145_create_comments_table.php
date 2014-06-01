<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    public function up()
    {
        Schema::create('comments', function($table)
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
        Schema::dropIfExists('comments');
    }
}
