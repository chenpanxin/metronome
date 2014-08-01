<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRemindersTable extends Migration {

    public function up()
    {
        Schema::create('user_reminders', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_reminders');
    }
}
