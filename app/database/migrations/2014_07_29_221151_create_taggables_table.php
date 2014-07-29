<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggablesTable extends Migration {

    public function up()
    {
        Schema::create('taggables', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tag_id')->index();
            $table->integer('taggable_id')->index();
            $table->integer('taggable_type')->index();
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('taggables');
    }
}
