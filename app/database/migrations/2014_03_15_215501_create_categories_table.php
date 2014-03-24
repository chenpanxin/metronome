<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    public function up()
    {
        Schema::create('categories', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('topics_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
