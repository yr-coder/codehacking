@extends('layouts.admin')


@section('content')

<h1>Comments</h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Post</th>

        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>Created</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @if($comments)

        @foreach($comments as $comment)

            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post->title}}</a></td>

                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{str_limit($comment->body, 25)}}</td>
                <td>{{$comment->created_at->diffForHumans()}}</td>
                <td>
                    @if($comment->is_active == 0)

                        {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id], 'class' => '']) !!}

                        {!! Form::hidden('is_active', 1) !!}

                        <div class="form-group">
                            {!! Form::submit('Approve',
                              array('class'=>'btn btn-info')) !!}
                        </div>
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id], 'class' => '']) !!}

                        {!! Form::hidden('is_active', 0) !!}

                        <div class="form-group">
                            {!! Form::submit('Unapprove',
                              array('class'=>'btn btn-success')) !!}
                        </div>
                        {!! Form::close() !!}


                    @endif



                </td>
                <td>

                    {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id], 'class' => '']) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete',
                          array('class'=>'btn btn-danger')) !!}
                    </div>
                    {!! Form::close() !!}


                </td>
            </tr>

        @endforeach

    @endif

    </tbody>

</table>


    @stop