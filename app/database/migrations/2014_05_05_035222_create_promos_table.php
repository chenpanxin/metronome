<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration {

    public function up()
    {
        Schema::create('promos', function($table)
        {
            $table->increments('id');
            $table->string('image_url');
            $table->string('target_url');
        });
    }

    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
