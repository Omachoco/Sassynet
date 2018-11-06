<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    //
	   protected $photo_folder = '/images/';
	   
	   protected $fillable = [
        'user_id', 'path'
    ];

//create accessor to attach /mage/ path at the begining of the photo
   public function getPathAttribute($value){
	    return $this->photo_folder . $value;
	  }
   
}
