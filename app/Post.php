<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	  
  protected $fillable = [
        'category_id', 
		'user_id',
		 'title',
		 'body'
    ];
	
  public function user(){
	  return $this->belongsTo('App\User');
	  
	  }
	  
    public function photos(){
	  return $this->hasOne('App\Photo');
	  
	  }
	  
	   public function category(){
	  return $this->BelongsTo('App\Category');
	  
	  }
}
