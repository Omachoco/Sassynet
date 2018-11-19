<?php

namespace App\Http\Controllers;
use App\User;
use App\Role; 
use App\Photo;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use illuminate\support\facades\Auth;

class PostCommentsController extends Controller
{
    //
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		
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
       if(Auth::user()){
			$user = Auth::user();
			$username = $user->name;
			$email = $user->email;
			}else{
		
				$username = ''; //testing
				$email = ''; //tesing
				//$username = $request->input('name');
				//$email = $request->input('email');
				}
       $post_id = $request->input('post_id');
	 
       $post = Post::findOrFail($post_id);
	 
	   $input =[
        'author' => $username,
        'body'   => $request->input('body'),
	    'email'  => $email
             ];
	   
	   $comment = new Comment($input);
       $post->comments()->save($comment);
	 

	 $request->session()->flash('comment_message', 'Your message have been submitted and it\'s waiting approval');
	 
	 return redirect()->back();
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
}
