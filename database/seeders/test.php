<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $arr = [
            [
                'cairo' => 'cairo',
                'elmehalah' => 'elmehalah',
                'shobra' => 'shobra',
            ],
            [
                'cairo' => 'cairo',
                'elmehalah' => 'elmehalah',
                'shobra' => 'shobra',
            ],
            [
                'cairo' => 'cairo',
                'elmehalah' => 'elmehalah',
                'shobra' => 'shobra',
            ]
        ];
        $addresses = json_encode($arr) ;
        
        $patient = DB::table('doctors_info')->insert([
            'doctor_id' => '1',
            'mobile_number' => '656565',
            'adress' => $addresses,
            'education' => 'shobra',
            'specialization' => '20',
            'schedule' => '20',
            'created_at' => now()
        ]);
    }
}
