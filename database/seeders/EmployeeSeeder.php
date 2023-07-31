<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'firstname' => 'Lord Nanang',
                'lastname' => 'Ekspor',
                'email' => 'lord.nanang@gmail.com',
                'age' => '08123456789',
                'position_id' => 1
            ],
            [
                'firstname' => 'Bumi Kupijak',
                'lastname' => 'Multimedia',
                'email' => 'Bumi.Kupijak@gmail.com',
                'age' => '08123456789',
                'position_id' => 2
            ],
            [
                'firstname' => 'Berlian Rahmy',
                'lastname' => 'Konsultan Hukum',
                'email' => 'berlian.rahmy@gmail.com',
                'age' => '08123456789',
                'position_id' => 3
            ],
        ]);
    }
}
