<?php

use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration {

    public function up()
    {
        Schema::create('relationships', function($table)
        {
            $table->increments('id');
            $table->integer('follower_id');
            $table->integer('followed_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
