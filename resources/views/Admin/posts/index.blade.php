@extends('layouts.admin')


@section('content')

        
<h1> Posts </h1>

<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Body</th>
        <th>Comments</th>
        <th> videos <th>
        <th>Created </th>
        <th>Updated </th>
      </tr>
    </thead>
    <tbody>
       @if($posts)
         @foreach($posts as $post) 
          <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category?$post->category->name:'Uncategorized'}}</td>
          <td><img src="{{$post->photos?$post->photos->path:'/images/imgholder.jpeg'}}" class="img-fluid rounded mx-auto" height="50" width="50"></td>
           <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
           <td>{{$post->body}}</td>
           <td><a href="{{route('post.comments', $post->id)}}">{{$post->comments_count}}</a></td>
           <td><a href="">{{$post->videos_count}}</a></td>
           <td></td>
           <td>{{$post->created_at->diffForHumans()}}</td>
           <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
         @endforeach
     @endif
    </tbody>
  </table>

@endsection