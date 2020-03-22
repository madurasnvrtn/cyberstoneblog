@extends('layouts.admin')


@section('content')

    <h2>Edit a User {{$user->name}}</h2>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            @if(count($errors) >0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-2">
        <img src="{{$user->photo ? $user->photo->file: '/images/placeholder.png'}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-10">
        {!!  Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('photo', 'Photo:') !!}
            {!! Form::file('photo', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', [''=>'Chose an option'] + $roles, null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active',array(1 =>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}


         {!!  Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}



             <div class="form-group">
                 {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
             </div>
             {!! Form::close() !!}
    </div>




@stop