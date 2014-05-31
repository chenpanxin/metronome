<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        if (App::environment() == 'local') {
            $this->call('UserTableSeeder');
            $this->call('TopicTableSeeder');
            $this->call('CategoryTableSeeder');
            $this->call('CommentTableSeeder');
            $this->call('ReplyTableSeeder');
        }
    }
}
