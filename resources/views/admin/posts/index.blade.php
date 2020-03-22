@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>By</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : "No Category"}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file:'/images/placeholder_posts.png' }}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>

                </tr>
            @endforeach

        @endif


        </tbody>
    </table>

@stop