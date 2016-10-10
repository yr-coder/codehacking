@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Created {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        {!! Form::hidden('post_id', $post->id) !!}

        <div class="form-group">
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->

    @if($post->comments)

        @foreach($post->comments as $comment)

            @if($comment->is_active)

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="50" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

                    @if($comment->replies)

                        @foreach($comment->replies as $reply)

                            @if($reply->is_active)

                                {{--Nested Comment--}}

                                <div class="nested-comment media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="50" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>

                                    </div>
                            @endif

                        @endforeach

                    @endif

                    <div class="comment-reply-container">

                        <div class="toggle-reply btn btn-primary pull-right">Reply</div>

                        <div class="comment-reply col-sm-8">

                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                    {!! Form::hidden('comment_id', $comment->id) !!}

                            <div class="form-group">
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 1]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                            </div>
                    {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>


            @endif

        @endforeach

    @endif

    @stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {

            $(this).next().slideToggle("slow");

        });


    </script>


    @stop