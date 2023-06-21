<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Zizo',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'created_at' => Carbon::now(),
            'isAdmin' => true,
            'phone' => '01115478566',
        ]);
    }
}
