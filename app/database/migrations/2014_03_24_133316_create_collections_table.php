<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration {

    public function up()
    {
        Schema::create('collections', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('cover_url');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('user_id')->index();
            $table->integer('posts_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
