<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            [
                'code' => 'P1',
                'name' => 'Paket 1',
                'description' => 'Planning'
            ],
            [
                'code' => 'P2',
                'name' => 'Paket 2',
                'description' => 'Planning + Desain'
            ],
            [
                'code' => 'P3',
                'name' => 'Paket 3',
                'description' => 'Planning + Desain + Development'
            ],
        ]);
    }
}
