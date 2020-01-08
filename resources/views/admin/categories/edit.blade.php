@extends('layouts.admin')

@section('content')
    <h1>categories</h1>

    <div class="col-sm-6">
        {!! Form::model(['method'=>'post','action'=>'AdminCategoriesController@update'] )!!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('name', 'Category:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::submit('save', ['class'=>' btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        @if ($categories)
            <table class="table table-responsive table-stripped">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>created date</th>


                </thead>
                <tbody>
                    
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : "nodate"}}</td>

                        </tr>

                    @endforeach
                    


                </tbody>
            </table>
        @endif


    </div>
@endsection