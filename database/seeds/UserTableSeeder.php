<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'username' => 'taikhoan'.$i,
                'password' => 'matkhau'.$i,
                'email' => 'email'.$i.'@gmail.com',
                'displayname' => 'tenhienthi'.$i,
                'created_at' => Date(now()),
            ]);
        }
    }
}
