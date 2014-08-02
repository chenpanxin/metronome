<?php

class TestingSeeder extends Seeder {

    public function run()
    {
        User::truncate();
        Profile::truncate();

        $user = User::create([
            'email'      => 'me@ayur.io',
            'username'   => 'Ayur',
            'downcase'   => 'ayur',
            'avatar_url' => '',
            'password'   => Hash::make('user_password')
        ]);

        $user->profile()->save(new Profile);
    }
}
