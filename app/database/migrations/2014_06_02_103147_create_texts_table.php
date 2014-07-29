<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration {

    public function up()
    {
        Schema::create('texts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('textable_id')->index();
            $table->string('textable_type')->index();
            $table->text('markdown');
            $table->text('markup');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('texts');
    }
}
