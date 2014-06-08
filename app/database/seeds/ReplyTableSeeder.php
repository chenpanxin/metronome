<?php

use Faker\Factory as Fakery;

class ReplyTableSeeder extends Seeder {

    public function run()
    {
        Reply::truncate();
        $faker = Fakery::create();
        foreach (range(1, 2) as $index) {
            Reply::create([
                'user_id'  => mt_rand(1, 3),
                'comment_id' => mt_rand(1, 3),
                'content'  => $faker->paragraph,
            ]);
        }
    }
}
