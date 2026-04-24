<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            ['name' => 'England', 'country_id' => 1],
            ['name' => 'Scotland', 'country_id' => 1],
            ['name' => 'New South Wales', 'country_id' => 2],
            ['name' => 'Victoria', 'country_id' => 2],
            ['name' => 'California', 'country_id' => 3],
            ['name' => 'Texas', 'country_id' => 3],
        ]);
    }
}
