@extends('layouts.admin')


@section('content')

        
<h1> Create Post </h1>

@include('partials.form_errors')
 <div class="col-lg-12">
{!! Form::open(['method'=>'POST', 'action'=>'AdminPostController@store', 'files'=>true]) !!}
   <div class="form-group">
    {!!Form::label('title', 'Post Title: ');!!}
    {!!Form::text('title', null, ['class' => 'form-control']);!!}
   </div> 
    
   <div class="form-group">
    {!!Form::label('category_id', 'Category: ');!!}
    {!!Form::select('category',[''=>'Select Category'] + $categories, null, ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('path', 'Upload photo: ');!!}
    {!!Form::file('path', null, ['class' => 'form-control-file']);!!}
   </div>
   
   
   <div class="form-group">
    {!!Form::label('body', 'Description: ');!!}
    {!!Form::textarea('body', null, ['class' => 'form-control', 'rows'=>4]);!!}
   </div>
   
    {!!Form::submit('Create Post!', ['class' => 'btn btn-primary']);!!}
    </div>
{!! Form::close() !!}




@endsection