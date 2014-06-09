<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();
        Profile::truncate();

        User::create([
            'username'   => 'Suzy',
            'downcase'   => 'suzy',
            'email'      => 'suzy@me.io',
            'avatar_url' => Str::avatar_url(),
            'password'   => Hash::make('password')
        ]);

        Profile::create([
            'user_id'      => 1,
            'verify_token' => str_random(64)
        ]);
    }
}
