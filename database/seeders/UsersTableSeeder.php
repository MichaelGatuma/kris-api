<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Title'=>'Mr.',
            'name' => 'Michael Gates',
            'email' => 'michael@gmail.com',
            'password' => Hash::make('123456'),
            'profPic'=>'435253635.png'
        ]);
    }
}
