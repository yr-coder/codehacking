@extends('layouts.admin')


@section('content')


        @if(count($replies) > 0)

            <h1>Replies</h1>

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


            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->slug)}}">{{$reply->comment->post->title}}</a></td>

                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{str_limit($reply->body, 25)}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>
                        @if($reply->is_active == 0)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], 'class' => '']) !!}

                            {!! Form::hidden('is_active', 1) !!}

                            <div class="form-group">
                                {!! Form::submit('Approve',
                                  array('class'=>'btn btn-info')) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id], 'class' => '']) !!}

                            {!! Form::hidden('is_active', 0) !!}

                            <div class="form-group">
                                {!! Form::submit('Unapprove',
                                  array('class'=>'btn btn-success')) !!}
                            </div>
                            {!! Form::close() !!}


                        @endif



                    </td>
                    <td>

                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id], 'class' => '']) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete',
                              array('class'=>'btn btn-danger')) !!}
                        </div>
                        {!! Form::close() !!}


                    </td>
                </tr>

            @endforeach

            @else

            <h1>No replies</h1>

        @endif

        </tbody>

    </table>


@stop