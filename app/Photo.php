<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
	protected $photo_folder = '/images/';
	
	
	 protected $fillable = [
        'path'
    ];

//create accessor to attach /mage/ path at the begining of the photo
public function getPathAttribute($value){
	 return $this->photo_folder . $value;
	}

//returns the users profile picture, checks if the user have a profile picture uploaded


  public function post(){
	return $this->belongsTo('App\User');
	  }
	 
	 }

