<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    protected $guarded;
    public $translatable = ['name'];

    protected $table = 'sections';
    public $timestamps = true;


    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'class_id');

    }//end of class room relation

    public function teachers(){

        return $this->belongsToMany(Teacher::class,'teacher_section');

    }//end of teahcer

}
