<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الاول',
            'nameEn' => 'Week 1',
            'order' => 1,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الثانى',
            'nameEn' => 'Week 2',
            'order' => 2,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الثالث',
            'nameEn' => 'Week 3',
            'order' => 3,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الرابع',
            'nameEn' => 'Week 4',
            'order' => 4,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الخامس',
            'nameEn' => 'Week 5',
            'order' => 5,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع السادس',
            'nameEn' => 'Week 6',
            'order' => 6,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع السابع',
            'nameEn' => 'Week 7',
            'order' => 7,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الثامن',
            'nameEn' => 'Week 8',
            'order' => 8,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع التاسع',
            'nameEn' => 'Week 9',
            'order' => 9,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع العاشر',
            'nameEn' => 'Week 10',
            'order' => 10,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الحادى عشر',
            'nameEn' => 'Week 11',
            'order' => 11,
        ]);
        DB::table('weeks')->insert([
            'nameAr' => 'الاسبوع الثانى عشر',
            'nameEn' => 'Week 12',
            'order' => 12,
        ]);
    }
}
