<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('password');
            $table->string('avatar_url');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('downcase')->unique();
            $table->string('locale')->default('zh');
            $table->string('remember_token')->nullable();
            $table->boolean('verify')->default(false);
            $table->boolean('staff')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
