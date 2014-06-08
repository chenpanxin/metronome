<?php

use Faker\Factory as Fakery;

class TopicTableSeeder extends Seeder {

    public function run()
    {
        Topic::truncate();
        $faker = Fakery::create();
        foreach (range(1, 4) as $index) {
            Topic::create([
                'user_id'     => mt_rand(1, 3),
                'category_id' => mt_rand(1, 2),
                'title'       => $faker->userName,
                'body'        => $faker->paragraph,
            ]);
        }
    }
}
