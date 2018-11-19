@extends('layouts.admin')


@section('content')

     

  

  @if(count($comments)> 0)
   <h1>Comments</h1>
   <table class="table table-hover">
     <thead>
        <tr> 
           <th>Id</th>
           <th>Author</th>
           <th>Email</th>
           <th>Body</th>
           <th>Go to</th>
           <th> Status </th>
           <th>Delete</th>
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
         
        <td>
        @if($comment->is_active == 1)
        
         {!! Form::open(['method'=>'PATCH',  'action'=>['AdminPostCommentsController@update',                          $comment->id]]) !!}
          <input type="hidden" name="is_active" value="0">
          {!!Form::submit('Un-Approve', ['class' => 'btn btn-success']);!!}
         {!! Form::close() !!} 
          
        @else
         {!! Form::open(['method'=>'PATCH',  'action'=>['AdminPostCommentsController@update',            $comment->id]]) !!}
          <input type="hidden" name="is_active" value="1">
          {!!Form::submit('Approve', ['class' => 'btn btn-info']);!!}
         {!! Form::close() !!}
        @endif
        </td>
        
         
         <td>
         {!! Form::open(['method'=>'DELETE',  'action'=>['AdminPostCommentsController@destroy',            $comment->id]]) !!}
          {!!Form::submit('Delete', ['class' => 'btn btn-danger']);!!}
         {!! Form::close() !!}
         </td>
         
        <td>{{$comment->created_at->diffForHumans()}}</td>
      </tr>
       @endforeach
     </tbody>
   </table>
      
      
  @else
     <h1 class="text-center">No Comments</h1>
  @endif
  
@endsection