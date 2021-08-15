<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded;


    public function teacher(){

        return $this->belongsTo(Teacher::class);

    }//end of teacher


    public function subject(){
        return $this->belongsTo(Subject::class);
    }//end of subject

    public function grade(){
        return $this->belongsTo(Grade::class);
    }//end of grade

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }//end of classroom

    public function section(){
        return $this->belongsTo(Section::class);
    }//end of section



}//end of exam model
