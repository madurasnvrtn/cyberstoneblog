@extends('layouts.admin')


@section('content')
<h1>Create Post</h1>

     <div class="row">
          {!!  Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}

          <div class="form-group">
               {!! Form::label('title', 'Title:') !!}
               {!! Form::text('title', null, ['class'=>'form-control'])!!}
          </div>
          <div class="form-group">
               {!! Form::label('cat_id', 'Category:') !!}
               {!! Form::select('cat_id', array('1'=>'PHP',0=>'JavaScript'),null, ['class'=>'form-control'])!!}
          </div>
          <div class="form-group">
               {!! Form::label('photo_id', 'Image:') !!}
               {!! Form::file('photo_id')!!}
          </div>

          <div class="form-group">
               {!! Form::label('body', 'Content:') !!}
               {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
          </div>



          <div class="form-group">
               {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
     </div>

     <div class="row">
          @include('includes.form_error')
     </div>

@stop