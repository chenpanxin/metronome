<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {

    public function up()
    {
        Schema::create('replies', function($table)
        {
            $table->increments('id');
            $table->integer('comment_id');
            $table->integer('user_id');
            $table->text('content');
            $table->boolean('trashed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
