<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    public function up()
    {
        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('collection_id')->index();
            $table->integer('user_id')->index();
            $table->integer('likes_count')->default(0);
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('body')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
