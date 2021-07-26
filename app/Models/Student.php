<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;




class Student extends Model
{
    use HasTranslations;
    use SoftDeletes;
    public $translatable = ['name'];

    protected $guarded;



    public function gender(){

        return $this->belongsTo(Gender::class);

    }//end of gender relation

    public function grade(){

        return $this->belongsTo(Grade::class);

    }//end of gender relation

    public function classroom(){

        return $this->belongsTo(Classroom::class,'class_id');

    }//end of classroom  relation

    public function section(){

        return $this->belongsTo(Section::class);

    }//end of section  relation

    public function studentParent(){

        return $this->belongsTo(StudentParent::class,'parent_id');

    }//end of studentParent  relation

    public function nationality(){

        return $this->belongsTo(Nationality::class,'nationalitie_id');

    }//end of section  relation


    public function promotion(){

        return $this->hasMany(Promotion::class);

    }//end of promotion



    public function images()
    {

        return $this->morphMany(Image::class, 'imageable');

    }//end of image


    public function studentAccount()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');

    }//end studentAccount

    public function paymentStudent(){

        return $this->hasMany(PaymentStudent::class, 'student_id');

    }//end of payment student relation

    public function attendances(){

        return $this->hasMany(Attendance::class);

    }//end of relation

}//end of student
