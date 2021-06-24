<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Classroom extends Model
{

    use HasTranslations;

    public $translatable = ['name'];
    protected $guarded;

    protected $table = 'class_rooms';
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }//end of grade


    public function sections(){
       return $this->hasMany(Section::class,'class_id','id');
    }//end of sections

}//end of model
