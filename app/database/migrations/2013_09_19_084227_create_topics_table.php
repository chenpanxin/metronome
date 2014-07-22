<?php

use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration {

    public function up()
    {
        Schema::create('topics', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->integer('likes_count')->default(0);
            $table->integer('replies_count')->default(0);
            $table->boolean('frozen')->default(false);
            $table->float('ranking')->default('0.0');
            $table->string('title');
            $table->text('body')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
