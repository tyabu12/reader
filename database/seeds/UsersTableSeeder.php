<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        // 固定ユーザーを作成
        DB::table('users')->insert([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_MAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);

        for ($i = 0; $i < 19; $i++) {
            DB::table('users')->insert([
                'name' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt(env('RANDOM_PASSWORD')),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
