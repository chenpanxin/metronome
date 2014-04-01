<?php

use Faker\Factory as Fakery;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::truncate();
        $faker = Fakery::create('ja_JP');
        foreach (range(1, 9) as $index) {
            Category::create([
                'name'        => $faker->kanaName,
                'slug'        => join('-', [$faker->userName, $faker->randomNumber]),
                'description' => $faker->paragraph
            ]);
        }
    }
}
