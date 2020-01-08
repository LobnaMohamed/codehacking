@extends('layouts.admin')

@section('content')
    <h1>Create post</h1>
    <div class="row">
        {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('title', 'Post title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',array('1'=>'php','2'=>'java'),null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body','description :') !!}
                {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>3]) !!}
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
                {!! Form::submit('create Post', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection