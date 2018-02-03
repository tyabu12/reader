<?php

use Illuminate\Database\Seeder;

class FeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++) {
            DB::table('feeds')->insert([
                'name' => $faker->domainName(),
                'url' => $faker->unique()->url()
            ]);
        }
    }
}
