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
            $table->string('verify_token')->index();
            $table->string('nickname')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('school')->nullable();
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
