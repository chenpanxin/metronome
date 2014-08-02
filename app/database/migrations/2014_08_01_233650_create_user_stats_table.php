<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatsTable extends Migration {

    public function up()
    {
        Schema::create('user_stats', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('extern_uid')->nullable();
            $table->integer('failed_attempts')->default(0);
            $table->integer('logged_count')->default(0);
            $table->integer('last_logged_count')->default(0);
            $table->string('verification_token')->index();
            $table->string('provider')->nullable();
            $table->string('logged_ip')->nullable();
            $table->string('last_logged_ip')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('logged_at')->nullable();
            $table->timestamp('last_logged_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_stats');
    }
}
