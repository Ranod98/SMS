<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي','ku'=>'عه‌ره‌بی'],
            ['en'=> 'Sciences', 'ar'=> 'علوم','ku'=>'زانست'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي','ku'=>'كۆمپیوته‌ر'],
            ['en'=> 'English', 'ar'=> 'انجليزي','ku'=>'ئینگلیزی'],
        ];
        foreach ($specializations as $S) {
            \App\Models\Specialization::create(['name' => $S]);
        }
    }
}
