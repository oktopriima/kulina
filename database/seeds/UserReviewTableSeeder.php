<?php

use Illuminate\Database\Seeder;
use App\UserReview;

class UserReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        UserReview::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            UserReview::create([
                // 'title' => $faker->sentence,
                // 'body' => $faker->paragraph,
                'order_id' => $faker->numberBetween(1, 99), 
                'product_id' => $faker->numberBetween(1, 99), 
                'user_id' => $faker->numberBetween(1, 99), 
                'rating' => $faker->numberBetween(2, 5), 
                'review' => $faker->paragraph
            ]);
        }
    }
}