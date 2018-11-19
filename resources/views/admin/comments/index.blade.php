@extends('layouts.admin')


@section('content')

     

   <h1>Comments</h1>

  @if(count($comments)> 0)
   <table class="table table-hover">
     <thead>
        <tr>
           <th>Id</th>
           <th>Author</th>
           <th>Email</th>
           <th>Body</th>
           <th>Created</th>
        </tr>
     </thead>
     
      
     <tbody>
      @foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        
        @if($comment->commentable->is_post  == 1) 
           <td><a href="{{route('posts.show', $comment->commentable->id)}}">Visit Post</a></td>
          @else 
           <td><a href="{{route('posts.show', $comment->commentable->id)}}">Visit Video</a></td>
          @endif
        <td>{{$comment->created_at->diffForHumans()}}</td>
      </tr>
       @endforeach
     </tbody>
   </table>
      
      
  @else
     <h1 class="text-center">No Comments</h1>
  @endif
  
@endsection