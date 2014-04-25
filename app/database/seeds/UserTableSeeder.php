<?php

use Faker\Factory as Fakery;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();
        $faker = Fakery::create('ja_JP');
        foreach (range(1, 9) as $index) {
            User::create([
                'email'      => $faker->freeEmail,
                'username'   => $faker->userName,
                'avatar_url' => Str::avatar_url(),
                'password'   => Hash::make('password')
            ]);
        }
    }
}
