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
	
	public function post($post)
	 {
	
		// $post = Post::withCount('comments', 'videos')->get();
	
	    $post = Post::withCount(['comments', 'videos' => function ($query) {
                 $query->where('post_id', 'id');
               }])->get();
			  
			   // $post[0]->comments_count 
			   //return $post[0]->videos_count;

			 return view('post', compact('post'));
	  }
		
		
}
