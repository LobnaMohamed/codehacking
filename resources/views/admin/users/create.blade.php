@extends('layouts.admin')

@section('content')
    
    <h1>Create users</h1>
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name', 'User name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Privillage:') !!}
            {!! Form::select('role_id', $roles,null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',array(1=>'active',0=>'not active'),0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file','Upload file:') !!}
            {!! Form::file('file', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::submit('save user', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@include('includes.form_errors')


@endsection