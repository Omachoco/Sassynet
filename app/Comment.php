<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
		  
  protected $fillable = [
        'commentable_id', 
		'commentable_type',
		 'is_active',
		 'auhtor',
		 'body',
		 'email'
    ];
	
   protected $table = 'all_comments';
	 
	 
   public function commentable()
       {
         return $this->morphTo();
       }
	   
	
   public function replies(){
	   return $this->hasMany('App\CommentReply');
	   
	   }  
	  
  
} 
