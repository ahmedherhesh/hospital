<?php

namespace Database\Seeders;
use App\Models\Message;
use Illuminate\Database\Seeder;

class Messages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msg=[
            'patient_id' => '2',
            'doctor_id' => '1',
            'title' => 'can you help me please',
            'content' => 'Welcome I am ahmed can you help me please',
            'created_at' => now(),
        ];

        $reply=[
            'patient_id' => '1',
            'doctor_id' => '1',
            'content' => 'Welcome I am ahmed can you help me please',
            'message_id' => '1',
            'created_at' => now(),
        ];
        Message::insert($msg);
    }
}
