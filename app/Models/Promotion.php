<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
   protected $guarded;

   public function student(){

       return $this->belongsTo(Student::class,'student_id');

   }//end of students

    public function fromGrade(){

        return $this->belongsTo(Grade::class,'from_grade');

    }//end of fromGrade

    public function fromClass(){

        return $this->belongsTo(Classroom::class,'from_classroom');

    }//end of fromClass

    public function fromSection(){

        return $this->belongsTo(Section::class,'from_section');

    }//end of fromSection


    public function toGrade(){

        return $this->belongsTo(Grade::class,'to_grade');

    }//end of toGrade

    public function toClass(){

        return $this->belongsTo(Classroom::class,'to_classroom');

    }//end of toClass

    public function toSection(){

        return $this->belongsTo(Section::class,'to_section');

    }//end of toSection


}//end of class
