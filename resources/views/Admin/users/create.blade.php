@extends('layouts.admin')


@section('content')
<h1>Create Users </h1>

@include('partials.form_errors')

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
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
    {!!Form::select('role_id',[''=>'Choose Options'] + $roles, ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('file', 'Upload photo: ');!!}
    {!!Form::file('file', null, ['class' => 'form-control']);!!}
   </div>
   
   
   <div class="form-group">
    {!!Form::label('is_active', 'Status: ');!!}
    {!!Form::select('is_active', [1=>'Active', 0 => 'Not Active'], 0, ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('password', 'Password: ');!!}
    {!!Form::password('password', ['class' => 'form-control']);!!}
   </div>
   
    {!!Form::submit('Submit!', ['class' => 'btn btn-primary']);!!}
    
{!! Form::close() !!}



@endsection