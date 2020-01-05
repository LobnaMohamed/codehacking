@extends('layouts.admin')

@section('content')
    
    <h1>edit user</h1>
    <div class="row">
        
        <div class="col-sm-3">
            {{-- can be used in index also --}}
            <img src="{{$user->photo ? $user->photo->path :'https://via.placeholder.com/150' }}" alt="" class="img-responsive img-rounded">
        </div>
    
        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
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
                {!! Form::select('is_active',array(1=>'active',0=>'not active'),null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Upload file:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
    
            </div>
            <div class="form-group">
                {!! Form::submit('save user', ['class'=>'btn btn-primary']) !!}
            </div>
             {!! Form::close() !!}
    
    
        </div>

    </div>

    


    <div class="row">
        @include('includes.form_errors')
    </div>
    


@endsection