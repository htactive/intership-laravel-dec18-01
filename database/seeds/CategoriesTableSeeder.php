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

        for ($i=1; $i<11; $i++)
        {
            $categoryname = 'ten danh muc' . ' ' . $i;
            DB::table('categories')->insert([
                'categoryname' => $categoryname,
                'describe' => 'mo ta'.$i,
                'slug' => str_slug($categoryname),
                'status' => true,
            ]);
        }
    }
}
