<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();

        $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم',
                'ku'=> 'موسڵمان',
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي',
                'ku'=> 'مه‌سیحی',
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك',
                'ku'=> 'بێجگه‌ له‌وه‌',
            ],

        ];

        foreach ($religions as $R) {
            \App\Models\Religion::create(['name' => $R]);
        }
    }
}
