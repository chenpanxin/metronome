<?php

use Illuminate\Database\Migrations\Migration;

class CreateCurrentStatsTable extends Migration {

    public function up()
    {
        Schema::create('current_stats', function($table)
        {
            $table->increments('id');
            $table->string('website_name')->default('laravel');
            $table->string('website_version')->default('beta');
            $table->string('website_copyright')->nullable();
            $table->integer('topics')->default(0);
            $table->integer('users')->default(0);
            $table->integer('replies')->default(0);
            $table->integer('comments')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('current_stats');
    }
}
