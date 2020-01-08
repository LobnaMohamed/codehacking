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

              <th>Created</th>
              <th>updated</th>
    
            </tr>
          </thead>
          <tbody>
            
            @if($posts)
            
                @foreach ($posts as $post)
                     <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category_id}}</td>


                        <td><img height = '50px' src="{{$post->photo ? $post->photo->path : 'no photo'}} " alt=""> </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffforHumans()}}</td>
                        <td>{{$post->updated_at->diffforHumans()}}</td>
    
                    </tr>
                @endforeach
    
            @endif
    
    
          </tbody>
    </table>
@endsection