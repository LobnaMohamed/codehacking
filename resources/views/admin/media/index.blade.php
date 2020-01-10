@extends('layouts.admin')
@section('content')
    media



    @if($photos)
   
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>updated</th>
        
                </tr>
            </thead>
            <tbody>
                
                @foreach ($photos as $photo)
                     <tr>
                        <td>{{$photo->id}}</td>
                        <td>{{$photo->path}}</td>
                       
                        <td><img height = '50px' src="{{$photo->path ? $photo->path : 'no photo'}} " alt=""> </td>
                        <td>{{$photo->created_at->diffforHumans()}}</td>
                        <td>{{$photo->updated_at->diffforHumans()}}</td>
                        <td>
                            {!! Form::open(['method'=>'delete','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                                {!! Form::submit('delete', ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
        
        
        
            </tbody>
        </table>
    @endif
@endsection