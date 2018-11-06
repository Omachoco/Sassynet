@extends('layouts.admin')


@section('content')

<div class="col-sm-6">
<h2>Edit Category</h2>

{!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminPostCategoriesController@update', $category->id]]) !!}
   <div class="form-group">
    {!!Form::label('name', 'Name: ');!!}
    {!!Form::text('name', null, ['class' => 'form-control']);!!}
   </div> 
   {!!Form::submit('Update!', ['class' => 'btn btn-primary col-6']);!!}
{!! Form::close() !!}

</div>

@endsection