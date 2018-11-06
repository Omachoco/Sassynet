@extends('layouts.admin')


@section('content')

<div class="col-sm-3">
<h1 align="center">Edit user</h1>

<div class="card" style="width: 14rem;">
  <img src="{{$user->photo?$user->photo->path:'/images/placeholde.jpeg'}}" class="img-fluid rounded mx-auto card-img-top" height="100" width="100">
  <div class="card-body">
    {!! Form::open(['method'=>'POST',  'action'=>['AdminPostController@destroy', $user->id]]) !!}
    {!!Form::submit('Edit!', ['class' => 'btn btn-danger col-6']);!!}
    {!! Form::close() !!}
  </div>
</div>
</div>


<div class="col-sm-9">

@include('partials.form_errors')

{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
   <div class="form-group">
    {!!Form::label('name', 'Name: ');!!}
    {!!Form::text('name', null, ['class' => 'form-control']);!!}
   </div> 
    
    <div class="form-group">
    {!!Form::label('email', 'Email: ');!!}
    {!!Form::text('email', null, ['class' => 'form-control']);!!}
   </div>
    
   <div class="form-group">
    {!!Form::label('role_id', 'Role: ');!!}
    {!!Form::select('role_id', [$roles, ''=>'No Role'], ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('photo_id', 'Upload photo: ');!!}
    {!!Form::file('path', null, ['class' => 'form-control']);!!}
   </div>
   
   
   <div class="form-group">
    {!!Form::label('is_active', 'Status: ');!!}
    {!!Form::select('is_active', [1=>'Active', 0 => 'Not Active'], null, ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('password', 'Password: ');!!}
    {!!Form::password('password', ['class' => 'form-control']);!!}
   </div>
   
    {!!Form::submit('Submit!', ['class' => 'btn btn-primary col-6']);!!}
    
{!! Form::close() !!}

<!--User Delete Form-->
{!! Form::open(['method'=>'DELETE',  'action'=>['AdminUsersController@destroy', $user->id]]) !!}
    {!!Form::submit('Delete this user!', ['class' => 'btn btn-danger col-6']);!!}
    
{!! Form::close() !!}

</div>

@endsection