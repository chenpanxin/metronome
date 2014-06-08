<?php

use Faker\Factory as Fakery;

class CommentTableSeeder extends Seeder {

    public function run()
    {
        Comment::truncate();
        $faker = Fakery::create();
        foreach (range(1, 3) as $index) {
            Comment::create([
                'user_id'  => mt_rand(1, 3),
                'topic_id' => mt_rand(1, 4),
                'content'  => $faker->paragraph,
            ]);
        }
    }
}
