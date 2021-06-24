<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{

    use HasTranslations;
    public  $translatable= ['father_name','father_job','mother_name','mother_job'];

    protected $guarded ;

    public function ParentAttachmentPhotos(){

        return $this->hasMany(ParentAttachment::class,'parent_id','id');


    }//end of relation parent attach


}//end of model
