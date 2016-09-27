@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="col-sm-3">

        <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400?text=Image'}}" height="100" alt="">

    </div>

    <div class="col-sm-9">

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', [null => 'Choose an option'] + $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Post',
          array('class'=>'btn btn-primary col-sm-6')) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id], 'class' => '']) !!}

    <div class="form-group">
        {!! Form::submit('Delete Post',
          array('class'=>'btn btn-danger')) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')

    </div>


@stop