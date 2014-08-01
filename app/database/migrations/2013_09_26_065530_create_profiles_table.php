<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

    public function up()
    {
        Schema::create('profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('nickname')->nullable();
            $table->string('location')->nullable();
            $table->string('company')->nullable();
            $table->string('school')->nullable();
            $table->string('douban')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website_url')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('biography')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
