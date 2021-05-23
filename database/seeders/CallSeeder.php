<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calls')->insert([
            'listen_id' => 2,
            'name' => 'Bob Jackson',
            'telephone' => 6913839,
            'message' => 'Please call',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        DB::table('calls')->insert([
            'listen_id' => 2,
            'name' => 'Nancy',
            'telephone' => 3918246,
            'message' => 'Please call',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        DB::table('calls')->insert([
            'listen_id' => 2,
            'name' => 'Brian Kennedy',
            'telephone' => 2718914,
            'message' => 'He will call you',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

        DB::table('calls')->insert([
            'listen_id' => 2,
            'name' => 'Miss Wilson',
            'telephone' => 0,
            'message' => 'She will call you',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

    }
}
