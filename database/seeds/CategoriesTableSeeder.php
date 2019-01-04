<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i<10; $i++)
        {
            DB::table('categories')->insert([
                'categoryname' => str_random(10),
                'describe' => str_random(10).'@gmail.com',
                'status' => true,
            ]);
        }
    }
}
