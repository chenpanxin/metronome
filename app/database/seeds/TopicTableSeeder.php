<?php

use Faker\Factory as Fakery;

class TopicTableSeeder extends Seeder {

    public function run()
    {
        Topic::truncate();
        $faker = Fakery::create('ja_JP');
        foreach (range(1, 19) as $index) {
            Topic::create([
                'user_id'     => mt_rand(1, 9),
                'category_id' => mt_rand(1, 9),
                'title'       => $faker->kanaName,
                'body'        => $faker->paragraph,
            ]);
        }
    }
}
