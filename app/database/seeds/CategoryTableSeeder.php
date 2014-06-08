<?php

use Faker\Factory as Fakery;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::truncate();
        $faker = Fakery::create();
        foreach (range(1, 2) as $index) {
            Category::create([
                'name'        => $faker->userName,
                'slug'        => join('-', [$faker->userName, $faker->randomNumber]),
                'description' => $faker->paragraph
            ]);
        }
        foreach (Category::all() as $category) {
            $category->topics_count = $category->topics->count();
            $category->save();
        }
    }
}
