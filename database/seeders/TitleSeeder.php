<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('titles')->insert([
            'name' => 'Professor',
            'created_at' => Carbon::now(),
        ]);
        DB::table('titles')->insert([
            'name' => 'Doctor',
            'created_at' => Carbon::now(),
        ]);
        DB::table('titles')->insert([
            'name' => 'Teaching Assistant',
            'created_at' => Carbon::now(),
        ]);
    }
}
