<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded;

    public function grade(){

        return $this->belongsTo(Grade::class);
    }//end of teacher
    public function teacher(){

        return $this->belongsTo(Teacher::class);
    }//end of teacher


    public function classroom(){

        return $this->belongsTo(Classroom::class);
    }//end of classroom
}//end of subject
