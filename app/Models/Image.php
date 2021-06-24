<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $guarded;

    public function imageable()
    {
        return $this->morphTo();
    }//end of image able

}//end of model
