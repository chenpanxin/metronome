<?php

use Faker\Factory as Fakery;

class ReplyTableSeeder extends Seeder {

    public function run()
    {
        Reply::truncate();
        $faker = Fakery::create();
        foreach (range(1, 37) as $index) {
            Reply::create([
                'user_id'  => mt_rand(1, 9),
                'comment_id' => mt_rand(1, 9),
                'content'  => $faker->paragraph,
            ]);
        }
    }
}
