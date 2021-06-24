<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;

    protected $guarded;
    public  $translatable = ['name'];

    public  function gender(){

        return $this->belongsTo(Gender::class);

    }//end of gender

    public  function specialization(){

        return $this->belongsTo(Specialization::class);

    }//end of gender

    public function sections(){

        return $this->belongsToMany(Section::class,'teacher_section');

    }//end of section


}//end of teacher
