<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();

        for ($i = 1; $i<11; $i++)
        {
            DB::table('posts')->insert([
                'user_id'=> $i,
                'category_id'=> $i,
                'title' => 'tieu de'.$i,
                'content' => str_random(250),
                'introduce' => str_random(5).' '.str_random(5).' '.str_random(5),
                'created_at' => Date(now()),
            ]);
        }
    }
}
