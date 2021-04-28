<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('123456'),
            'quyen' =>'admin',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' =>'user',
            'email' =>'user@gmail.com',
            'password' => Hash::make('123456'),
            'quyen' =>'user',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

    }
}
