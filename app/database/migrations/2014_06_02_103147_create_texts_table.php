<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration {

    public function up()
    {
        Schema::create('texts', function($table)
        {
            $table->increments('id');
            $table->integer('markdownable_id')->index();
            $table->string('markdownable_type')->index();
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('texts');
    }
}
