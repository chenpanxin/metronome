<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        if (App::environment() == 'testing')
        {
            $this->call('TestingSeeder');
        }
    }
}
