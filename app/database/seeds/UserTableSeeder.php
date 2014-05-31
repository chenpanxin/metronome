<?php

use Faker\Factory as Fakery;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();
        $faker = Fakery::create();
        foreach (range(1, 9) as $index) {
            User::create([
                'email'      => $faker->freeEmail,
                'username'   => $faker->firstNameFemale,
                'avatar_url' => Str::avatar_url(),
                'password'   => Hash::make('password')
            ]);
        }
        foreach (range(1, 9) as $index) {
            Profile::create([
                'user_id'      => $index,
                'verify_token' => str_random(64)
            ]);
        }
    }
}
