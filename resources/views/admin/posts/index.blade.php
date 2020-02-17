@extends('layouts.admin')


@section('content')
    
    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Owner</th>
              <th>category</th>
              <th>photo</th>
              <th>title</th>
              <th>body</th>
              <th></th>
              <th>Created</th>
              <th>updated</th>
    
            </tr>
          </thead>
          <tbody>
            
            @if($posts)
            
                @foreach ($posts as $post)
                     <tr>
                        <td>{{$post->id}}</td>
                        <td> <a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a> </td>
                        <td>{{$post->category ? $post->category->name :'uncategorized'}}</td>


                        <td><img height = '50px' src="{{$post->photo ? $post->photo->path : 'no photo'}} " alt=""> </td>
                        <td>{{$post->title}}</td>
                        <td>{{str_limit($post->body,30)}}</td>
                        <td><a href="{{route('home.post',$post->id)}}">view post</a></td>
                        <td><a href="{{route('admin.comments.show',$post->id)}}">view comments</a></td>

                        <td>{{$post->created_at->diffforHumans()}}</td>
                        <td>{{$post->updated_at->diffforHumans()}}</td>
    
                    </tr>
                @endforeach
    
            @endif
    
    
          </tbody>
    </table>
@endsection