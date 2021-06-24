<?php

use Illuminate\Database\Seeder;

class NationalitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('nationalities')->delete();

        $nationals = [

            [
                'en'=> 'Iraq',
                'ar'=> 'اعراق',
                'ku' => 'ئێراق',
            ],
            [

                'en'=> 'United States',
                'ar'=> 'الولايات المتحدة',
                'ku' => 'ویلایه‌ته‌ یه‌كگرتوه‌كان',

            ],
            [

                'en'=> 'Saudi Arabia',
                'ar'=> 'السعودية',
                'ku' => 'ویلایه‌ته‌ یه‌كگرتوه‌كان',

            ],
            [

                'en'=> 'United Kingdom',
                'ar'=> 'المملكة المتحدة',
                'ku' => 'شانشینی یەکگرتوو',

            ],
            [

                'en'=> 'Turkey',
                'ar'=> 'تركیا',
                'ku' => 'توركیا',

            ],

        ];

        foreach ($nationals as $n) {
            \App\Models\Nationality::create(['name' => $n]);
        }

    }

}
