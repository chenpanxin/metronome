<?php

use Faker\Factory as Fakery;

class TopicTableSeeder extends Seeder {

    public function run()
    {
        Topic::truncate();

        $faker = Fakery::create();

        // foreach (range(1, 3) as $index) {
        //     Topic::create([
        //         'user_id'     => 1,
        //         'category_id' => mt_rand(1, 2),
        //         'title'       => $faker->userName,
        //         'body'        => $faker->paragraph,
        //     ]);
        // }
    }
}
