<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration {

    public function up()
    {
        Schema::create('relationships', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('follower_id')->index();
            $table->integer('followed_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
