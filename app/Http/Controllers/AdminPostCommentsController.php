<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class AdminPostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		//gets all the comments and pass it to the viewcoments views/page
		$comments = Comment::all();
		  return view('admin.comments.allcomments', compact('comments'));
		
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
		return $id;
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
		//used to approve a comments as specified in the id and rediect back to the comments page
		$comment = Comment::findOrFail($id);
		$comment->update($request->all());
		return redirect()->back();
		}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deletes a comment and redirects back to the comments page
		$comment = Comment::findOrFail($id);
		$comment->delete();
		return redirect()->back();
    }
	
	public function commentsForPost($postid){
		  $post = Post::findOrFail($postid);
		 $comments = $post->comments;
		 
		 return view('admin.comments.postcomments', compact('comments'));
		}
}
