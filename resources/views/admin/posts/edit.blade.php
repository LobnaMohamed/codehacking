@extends('layouts.admin')

@section('content')
    <h1>update post</h1>
    <div class="row">

        <div class="col-sm-3">
            <img src="{{$post->photo->path}}" alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($post,['method'=>'Patch','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('title', 'Post title:') !!}
                    {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id',[''=>'choose category'] + $categories,null, ['class'=>'form-control']) !!}
            
                </div>
                <div class="form-group">
                    {!! Form::label('body','description :') !!}
                    {!! Form::textarea('body',$post->body, ['class'=>'form-control','rows'=>3]) !!}
                </div>
                {{-- <div class="form-group">
                    {!! Form::label('user_id', 'Owner:') !!}
                    {!! Form::number('user_id', null, ['class'=>'form-control']) !!}


                </div> --}}
                <div class="form-group">
                    {!! Form::label('photo_id','Upload file:') !!}
                    {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'Delete','action'=>['AdminPostsController@destroy',$post->id]] )!!}
                <div class="form-group">
                    {!! Form::submit('delete post', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection