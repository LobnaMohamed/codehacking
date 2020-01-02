<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploads = '/images/';

    //accessor:

    public function getPathAttribute($photo){
        return $this->uploads . $photo ;
    }
    protected $fillable = ['path'];
}
