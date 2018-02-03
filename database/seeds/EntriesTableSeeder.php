<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 300; $i++) {
            DB::table('entries')->insert([
                'feed_id' => $faker->numberBetween(1, 20),
                'title' => $faker->text(20),
                'url' => $faker->unique()->url(),
                'published_at' => $faker->dateTime()
            ]);
        }
    }
}
