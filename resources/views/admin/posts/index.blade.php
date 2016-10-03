@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('deleted_post'))

        <p class="bg-success">{{session('deleted_post')}}</p>

    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/500'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 25)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">Comments</a></td>
                </tr>

            @endforeach

        @endif

        </tbody>

    </table>

@stop

