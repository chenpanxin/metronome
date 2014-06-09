<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        if (App::environment() == 'testing') {
            $this->call('UserTableSeeder');
            $this->call('TopicTableSeeder');
            $this->call('CategoryTableSeeder');
        }
    }
}
