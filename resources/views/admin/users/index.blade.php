@extends('layouts.admin')


@section('content')
@if (Session::has('deleted_user'))
  <p class='bg-danger'>{{ session('deleted_user') }}</p>
@endif

<h1>users</h1>

<table class="table">
    <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Created</th>
          <th>updated</th>

        </tr>
      </thead>
      <tbody>
        
        @if($users)
        
            @foreach ($users as $user)
                 <tr>
                    <td>{{$user->id}}</td>
                    {{-- <td>{{$user->photo ? $user->photo->path : 'user has no photo'}}</td> --}}
                    <td><img height="50px" src="{{$user->photo ? $user->photo->path : 'https://via.placeholder.com/150'}}" alt=""> </td>
                    
                    <td> <a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a> </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'user has no role'}}</td>
                    <td>{{$user->is_active == 0?'Active':'not Active'}}</td>
                    <td>{{$user->created_at->diffforHumans()}}</td>
                    <td>{{$user->updated_at->diffforHumans()}}</td>

                </tr>
            @endforeach

        @endif


      </tbody>
</table>
@endsection