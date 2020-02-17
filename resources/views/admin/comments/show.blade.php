@extends('layouts.admin')

@section('content')
    <h1>comments</h1>
    @if (count($comments)>0)
        <table class="table">
            <tr>
            <th>author</th>
            <th>email</th>
            <th>post</th>
            <th>body</th>
            </tr>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->post->body}}</td>
                    <td><a href="{{route('home.post',$comment->post->id)}}">view post</a></td>
                    <td>{{$comment->body}}</td>
                    <td>
                        @if ($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]] )!!}
                                {{ csrf_field() }}
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('un-approve', ['class'=>' btn btn-info']) !!}
                                </div>
                            {!! Form::close() !!}

                            @else 
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]] )!!}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="form-group">
                                        {!! Form::submit('approve', ['class'=>' btn btn-success']) !!}
                                    </div>
                                {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]] )!!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::submit('delete', ['class'=>' btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach


        </table>
    @else
        <h1 class='text-centered'> no  comments available</h1>
    @endif

@endsection