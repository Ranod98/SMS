<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    protected $guarded;

    use HasTranslations;
    public $translatable = ['title'];


    public function grade(){

        return $this->belongsTo(Grade::class);

    }//end of grade relation


    public function classroom(){

        return $this->belongsTo(Classroom::class,'classroom_id');

    }//end of class room relation
}//end of model
