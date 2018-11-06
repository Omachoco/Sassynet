@extends('layouts.admin')


@section('content')

 @if(Session::has('deleted_user'))
       <p class="text-danger mt-3 ml-10">{{Session('deleted_user')}}</p>
 @if(Session::has('user_update'))
       <p class="text-danger mt-3 ml-10">{{Session('user_update')}}</p>
       
        @endif
        @endif
        
<h1> Users </h1>
 
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
       @if($users)
         @foreach($users as $user) 
          <tr>
          <td>{{$user->id}}</td>
          <td><img src="{{$user->profilePicture?$user->profilePicture->path:'/images/placeholde.jpg'}}" class="img-fluid rounded mx-auto" height="50" width="50"></td>
         
    
           <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
           <td>{{$user->email}}</td>
           <td>{{$user->role->name}}</td>
           <td>{{$user->is_active = 1? "Active" : "Not Active"}}</td>
           <td>{{$user->created_at->diffForHumans()}}</td>
           <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
         @endforeach
     @endif
    </tbody>
  </table>

@endsection