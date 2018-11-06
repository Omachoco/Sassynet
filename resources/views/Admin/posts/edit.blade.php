@extends('layouts.admin')


@section('content')

        
<h1>Edit Post </h1>

@include('partials.form_errors')
 <div class="col-lg-12">
{!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostController@update', $post->id], 'files'=>true]) !!}
   <div class="form-group">
    {!!Form::label('title', 'Post Title: ');!!}
    {!!Form::text('title', null, ['class' => 'form-control']);!!}
   </div> 
    
   <div class="form-group">
    {!!Form::label('category_id', 'Category: ');!!}
    {!!Form::select('category', [$categories, ''=>'Uncategorized'], null, ['class' => 'form-control']);!!}
   </div>
   
    <div class="form-group">
    {!!Form::label('path', 'Upload photo: ');!!}
    {!!Form::file('path', null, ['class' => 'form-control-file']);!!}
   </div>
   
   
   <div class="form-group">
    {!!Form::label('body', 'Description: ');!!}
    {!!Form::textarea('body', null, ['class' => 'form-control', 'rows'=>4]);!!}
   </div>
 
    {!!Form::submit('Edit Post!', ['class' => 'btn btn-primary']);!!}

{!! Form::close() !!}

<!--User Delete Form-->
{!! Form::open(['method'=>'DELETE',  'action'=>['AdminPostController@destroy', $post->id]]) !!}
    {!!Form::submit('Delete this Post!', ['class' => 'btn btn-danger col-6']);!!}
    
{!! Form::close() !!}




@endsection