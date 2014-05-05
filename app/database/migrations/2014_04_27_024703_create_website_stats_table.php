<?php

use Illuminate\Database\Migrations\Migration;

class CreateWebsiteStatsTable extends Migration {

    public function up()
    {
        Schema::create('website_stats', function($table)
        {
            $table->increments('id');
            $table->integer('categories')->default(0);
            $table->integer('topics')->default(0);
            $table->integer('users')->default(0);
            $table->integer('tags')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('replies')->default(0);
            $table->integer('verify_users')->default(0);
            $table->string('top_tweet')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_stats');
    }
}
