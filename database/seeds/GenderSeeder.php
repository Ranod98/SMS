<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{

    public function run()
    {
        DB::table('genders')->delete();

        $genders = [
            ['en'=> 'Male', 'ar'=> 'ذكر','ku'=>'نێر'],
            ['en'=> 'Female', 'ar'=> 'انثي','ku'=>'مێ'],

        ];

        foreach ($genders as $ge) {
            \App\Models\Gender::create(['name' => $ge]);
        }
    }
}
