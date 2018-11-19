@extends('layouts.blog_post')


@section('content')


<div class="w-75">
<div class="card mt-5">
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
  
    <h5 class="card-title">{{$post->title}}</h5>
    <p style="margin-top:0">by {{$post->user->name}}</p>

    <p class="card-text">{{$post->body}} bbbbbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnvnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>
    <p class="card-text"><small class="text-muted">Last updated at {{$post->updated_at}}</small></p>
  </div>
  
  
     
  <div class="card-footer text-muted">
  
  @if(Session::has('comment_message'))
     {{session('comment_message')}}
     @endif
     
  {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store', 'files'=>true]) !!}
     <input type="hidden" name="post_id" value="{{$post->id}}">
     
  <div class="form-group">
    {!!Form::textarea('body', null, ['class' => 'form-control', 'placeholder'=>'Contribution', 'rows'=>4]);!!}
   </div>    
    {!!Form::submit('Submit Comment', ['class' => 'btn btn-primary']);!!}
    
{!! Form::close() !!}
</div>

<!-- post comments -->
<div class="mt-5 container">
   <p>{{count($comments) == 0 ? 'No Comments': 'Comments' . '(' . count($comments) . ')'}}</p>
   
     @foreach($comments as $comment)
     <div class="row mb-3">
       <div class="col-2 h-2"></div>
       <div class="col-8">{{$comment->body}}</div>
     </div>
     @endforeach
   
</div>
</div>
</div>


@endsection