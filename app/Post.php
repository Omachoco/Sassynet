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
	  
	  //gets all the comment for a post
	  public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
	
	  public function videos(){
		return $this->hasMany('App\Video');
		}
}
