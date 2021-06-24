<?php

use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('blood_types')->delete();

        $types  = ['O-','O+','A+','A-','B+','B-','AB+','AB-'];

        foreach($types as $type){
            \App\Models\BloodType::create([
                'name' => $type
            ]);
        }//end of foreach
    }
}
