<?php

use Faker\Factory as Fakery;

class CommentTableSeeder extends Seeder {

    public function run()
    {
        Comment::truncate();
        $faker = Fakery::create();
        foreach (range(1, 37) as $index) {
            Comment::create([
                'user_id'  => mt_rand(1, 9),
                'topic_id' => mt_rand(1, 19),
                'content'  => $faker->paragraph,
            ]);
        }
    }
}
