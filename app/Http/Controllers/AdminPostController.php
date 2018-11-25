<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Role; 
use App\Photo;
use App\Post;
use App\Category;
use App\Comment;
use App\Video;
use App\Http\Requests\PostCreateRequest;
use illuminate\support\facades\Auth;
use Illuminate\Support\Facades\Gate;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	 */
	 /*
	 public function __construct(){
		$this->middleware('auth');
		}
     */
    public function index()
    {
        //>
		$posts = Post::withCount('comments', 'videos')->paginate(2);
		return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	   $categories = Category::pluck('name', 'id')->all();//usesd to populate the role select input on the create form
       return view('admin.posts.create', compact( 'categories'));
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
       
		$title = $request->input('title');
		$category_id = $request->input('category');		
		$body = $request->input('body');		
		
		
		$post = new Post(['title' => $title, 'body' => $body, 'category_id' => $category_id]);
		
		 //checks if user is loggedin
		 if(!Auth::user()){
			 return redirect('/login');
			 }
			 
	    //creates post for the currenly logged in user
		$user = Auth::user(); //gets the currently logged in user
		$user->posts()->save($post);
		
		if($photofile = $request->file('path')){
		     $name = time() . $photofile->getClientOriginalName();//get the photo path from the form
			 $photofile->move('images', $name);//cretaes an image folder and moves the photo into the folder
			 $photo = new Photo(['path' => $name]);//create the photo and stores in the phot table as path value = to the name of the photo
			 $post->photos()->save($photo);
			}
			
		return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title_slug)
    {
        //
	 $post = Post::findBySlugOrFail($title_slug);
	  $comments = $post->comments()->where('is_Active', 1)->get();
	      return view('post', compact('post', 'comments'));
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
		 $post = Post::findOrFail($id);
		 $categories = Category::pluck('name', 'id')->all();//usesd to populate the role select input on the create form
		  return view('admin.posts.edit', compact('post', 'categories'));
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
		/*
		 //creates post for the currenly logged in user
		$user = Auth::user(); //gets the currently logged in user
		$post = 
		$user->posts()->whereId($id)->first()->update($post);
		*/
		
/*auhorization with policies here
if ($user->can('update', $post)) {	
*/
	
		
		
	   $post = Post::findOrFail($id);
	   
       if (Gate::denies('posts.update', $post)) {
          // The current user can't update the post...
          return redirect('/login');
                 }

         //the current user can update
       if (Gate::allows('posts.update', $post)) {
	
           // The current user can update the post...
		  $user = Auth::user();
     
		  $title = $request->input('title');
		  $category_id = $request->input('category');		
		  $body = $request->input('body');
		
		  $input = array('title' => $title, 'category_id' => $category_id, 'body' => $body );
		
			
		  if( $photofile = $request->file('path')){
			 
		     $name = time() . $photofile->getClientOriginalName();//get the photo path from the form
			 $photofile->move('images', $name);//cretaes an image folder and moves the photo into the folder         
			//$photo = new Photo(['path'=>$name]);
			 $post = $user->posts()->whereId($id)->first();//update for user hasmany post relationship
			 $post->photos()->update(['path'=>$name]);
	      }
		   
		  $user->posts()->whereId($id)->first()->update($input);//update for user hasmany post 
		  return redirect('/admin/posts');
		}
	

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
		$post = Post::findOrFail($id);
		if(file_exists(public_path() . $post->photos->path)){
			unlink(public_path() . $post->photos->path);
		  
                }
	
		$post->delete();
	}

}
