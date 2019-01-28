<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i<11; $i++)
        {
            DB::table('comments')->insert([
                'user_id' => $i,
                'post_id' => $i,
                'content' => str_random(5).' '.str_random(5).' '.str_random(5).' '.str_random(5).' '.str_random(5).' ',
                'created_at' => Date(now()),
            ]);
        }
    }
}
