<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    protected $guarded;

    public function student(){

        return $this->belongsTo(Student::class);

    }//end of student relation


    public function fee(){

        return $this->belongsTo(Fee::class);

    }//end of student relation

    public function grade(){

        return $this->belongsTo(Grade::class);

    }//end of student relation

    public function classroom(){

        return $this->belongsTo(Classroom::class,'class_id');

    }//end of student relation


}//end of model
