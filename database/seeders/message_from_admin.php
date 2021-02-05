<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class message_from_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages_from_admin')->insert([
            'sender_id' => '2',
            'doctor_id' => '1',
            'title' => 'can you help me please',
            'content' => 'Welcome I am ahmed can you help me please',
            'created_at' => now(),
        ]);
    }
}
