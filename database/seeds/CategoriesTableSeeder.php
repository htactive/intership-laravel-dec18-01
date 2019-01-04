<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('caregories')->insert([
            'categoryname' => str_random(10),
            'describe' => str_random(16),
            'stats' => integerValue(1),
    ]);
    }
}
