@extends('layouts.admin')


@section('content')

<h1>Comments</h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Post</th>
        <th>Visible</th>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
    @if($comments)

        @foreach($comments as $comment)

            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->post->title}}</td>
                <td>{{$comment->is_active == 1 ? "Visible" : "Not Visible"}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{str_limit($comment->body, 25)}}</td>
                <td>{{$comment->created_at->diffForHumans()}}</td>
                <td>{{$comment->updated_at->diffForHumans()}}</td>
            </tr>

        @endforeach

    @endif

    </tbody>

</table>


    @stop