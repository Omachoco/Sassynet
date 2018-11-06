@extends('layouts.admin')


@section('content')


<div class="col-sm-6">
<h2>Create Categories</h2>

{!! Form::open(['method'=>'POST', 'action'=>'AdminPostCategoriesController@store']) !!}
   <div class="form-group">
    {!!Form::label('name', 'Name: ');!!}
    {!!Form::text('name', null, ['class' => 'form-control']);!!}
   </div> 
   {!!Form::submit('Submit!', ['class' => 'btn btn-primary col-6']);!!}
{!! Form::close() !!}

</div>


<div class="col-sm-6">
<h2>Categories</h2>

<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
       @if($categories)
         @foreach($categories as $category) 
          <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
           <td>{{$category->created_at?$category->created_at->diffForHumans():'No date'}}</td>
           <td>{{$category->updated_at?$category->created_at->diffForHumans(): 'Not  been updated'}}</td>
            </tr>
         @endforeach
     @endif
    </tbody>
  </table>
</div>

@endsection