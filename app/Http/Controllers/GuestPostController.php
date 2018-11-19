<?php

namespace App\Http\Controllers;
use App\User;
use App\Role; 
use App\Photo;
use App\Post;
use App\Category;
use App\Comment;
use App\Video;
use Illuminate\Http\Request;

class GuestPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $posts = Post::withCount('comments', 'videos')->get();
		return view('\welcomeclone', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function post($id)
	 {
	
		// $post = Post::withCount('comments', 'videos')->get();
	   //returns the a count of comments and posts for the post with the id provided
	    
			   // $post[0]->comments_count 
			   //return $post[0]->videos_count;
         
		 $post = Post::findOrFail($id);
		 $comments = $post->comments()->where('is_Active', 1)->get(); //returns comments for the post with is as_active/approve set to true
	      return view('post', compact('post', 'comments'));
		  
	  }
		
		
}
