<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
            'name' => 'ahmed',
            'last_name' => 'herhesh',
            'personal_mobile' => '01152958015',
            'email' => 'ahmedherhesh3@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'doctor',
            'profile_image' =>'he.jpg',
            'created_at' => now()
            ],
            [
                'name' => 'ahmed',
                'last_name' => 'herhesh',
                'personal_mobile' => '01152958015',
                'email' => 'ahmedherhesh28@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'doctor',
                'profile_image' =>'he.jpg',
                'created_at' => now()
            ],
        );
    }
}
