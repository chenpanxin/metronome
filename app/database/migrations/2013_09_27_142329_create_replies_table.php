<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {

    public function up()
    {
        Schema::create('replies', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('comment_id')->index();
            $table->boolean('trashed')->default(false);
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
