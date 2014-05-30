<?php

use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

    public function up()
    {
        Schema::create('profiles', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nickname')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('school')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('verify_token')->nullable();
            $table->text('biography')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
