@extends('layouts.admin')


@section('content')

    @if(Session::has('updated_user'))

        <p class="bg-blue">{{session('updated_user')}}</p>
    @endif

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>
        @endif

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
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>


        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.png'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active ==1 ? 'Active' : 'Disabled'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

                @endforeach
        @endif



        </tbody>
      </table>

@stop