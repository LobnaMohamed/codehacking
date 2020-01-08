@extends('layouts.admin')

@section('content')
    <h1>categories</h1>

    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'patch','action'=>['AdminCategoriesController@update',$category->id]] )!!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('name', 'Category:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::submit('update category', ['class'=>' btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'delete','action'=>['AdminCategoriesController@destroy',$category->id]] )!!}
            <div class="form-group">
                {!! Form::submit('delete category', ['class'=>' btn btn-danger']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection