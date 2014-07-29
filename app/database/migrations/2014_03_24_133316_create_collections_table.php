<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration {

    public function up()
    {
        Schema::create('collections', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('cover');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
