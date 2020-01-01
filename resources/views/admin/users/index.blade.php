@extends('layouts.admin')


@section('content')
<h1>users</h1>

<table class="table">
    <thead>
        <tr>
          <th>ID</th>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 0?'Active':'not Active'}}</td>
                    <td>{{$user->created_at->diffforHumans()}}</td>
                    <td>{{$user->updated_at->diffforHumans()}}</td>

                </tr>
            @endforeach

        @endif


      </tbody>
</table>
@endsection