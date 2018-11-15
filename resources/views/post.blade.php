@extends('layouts.blog_post')


@section('content')



<div class="card mt-5 w-75">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
 
  <img class="card-img-top" src=".../100px180/" alt="Card image cap">
  <div class="card-body">
  
    <h5 class="card-title">{{$post[0]->title}}</h5>
    <p style="margin-top:0">by {{$post[0]->user->name}}</p>

    <p class="card-text">{{$post[0]->body}} bbbbbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnvnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
    <p class="card-text"><small class="text-muted">Last updated at {{$post[0]->updated_at}}</small></p>
  </div>
  
  <div class="card-footer text-muted">
  {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store', 'files'=>true]) !!}
     <input type="hidden" name="post_id" value="{{$post[0]->id}}">
     
  <div class="form-group">
    {!!Form::textarea('body', null, ['class' => 'form-control', 'placeholder'=>'Contribution', 'rows'=>4]);!!}
   </div>    
    {!!Form::submit('Submit Comment', ['class' => 'btn btn-primary']);!!}
    
{!! Form::close() !!}


</div>
</div>


@endsection