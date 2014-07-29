<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeablesTable extends Migration {

    public function up()
    {
        Schema::create('likeables', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('liker_id')->index();
            $table->integer('likeable_id')->index();
            $table->integer('likeable_type')->index();
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likeables');
    }
}
