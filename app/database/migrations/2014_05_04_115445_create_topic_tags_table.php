<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTagsTable extends Migration {

    public function up()
    {
        Schema::create('topic_tags', function($table)
        {
            $table->increments('id');
            $table->integer('tag_id')->index();
            $table->integer('topic_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_tags');
    }
}
