<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\User;
use App\Role; 
use App\Photo;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	*/
	
	//uncomment this function after finishing admin.. redirects if you are not loggedin
	
	
	public function __construct(){
		$this->middleware('auth');
		}
		
		
    public function index()
    {
		$users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
	   $roles = Role::pluck('name', 'id')->all();//usesd to populate the role select input on the create form
       return view('admin.users.create', compact( 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
	     {  
	
	   /// checks if password field is set or empty
		if(trim($request->password) ==''){
			  $input = $request->except('password');
			}else{
			  $input = $request->all();
			  $input['password'] = bcrypt($request->password); //hash the password value fom the form
				}
		
		$user = User::create($input);
		
		if($photofile = $request->file('path')){
		     $name = time() . $photofile->getClientOriginalName();//get the photo path from the form
			 $photofile->move('images', $name);//cretaes an image folder and moves the photo into the folder     
			 /*
			 $photo = Photo::create(['path' => $name]);//create the photo and stores in the phot table as path value = to the name of the photo
			$input['photo_id'] = $photo->id;//gets the photo id and adds it to the form value arrays
			*/
			
			 $photo = new Photo(['path' => $name]);//create the photo and stores in the phot table as path value = to the name of the photo
			 $user->photos()->save($photo);
			}
			
		
	
        
		return redirect('/admin/users');
	
			
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
          $user = User::findOrFail($id);
		  $roles = Role::pluck('name', 'id')->all();//usesd to populate the role selecrt input on the create form
	      return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
		$user = User::findOrFail($id);
		
		if(trim($request->password) ==''){
			  $input = $request->except('password');
			}else{
			  $input = $request->all();
			  $input['password'] = bcrypt($request->password); //hash the password value fom the form
				}
				
		$input = $request->all();
		if($photofile = $request->file('photo_id')){
		     $name = time() . $photofile->getClientOriginalName();//get the photo path from the form
			 $photofile->move('images', $name);//cretaes an image folder and moves the photo into the folder
			 $photo = Photo::create(['path' => $name]);//create the photo and stores in the phot table as path value = to the name of the photo
			$input['photo_id'] = $photo->id;//gets the photo id and adds it to the form value arrays
			}
		
        $user->update($input);
		
	    Session::flash('user_update', 'User Updated!');
		return redirect('/admin/users');
	
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
		$user = User::findOrFail($id);
	    $photoid = $user->photo->id;
		$photo = Photo::findOrFail($photoid);
		if(file_exists(public_path() . $user->photo->path)){
			unlink(public_path() . $user->photo->path);
		    $photo->delete();
		    $user->delete();
		}else{
			$user->delete();
			}
		 
		 //sets the Deleted user session when a user is deleted
		 Session::flash('deleted_user', 'User deleted!');
	 	 
	     return redirect('/admin/users');
    }
}
