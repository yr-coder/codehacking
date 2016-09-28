@extends('layouts.admin')

@section('content')

    <h1>Edit category</h1>

    <div>

        {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category',
              array('class'=>'btn btn-primary col-sm-6')) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Category',
              array('class'=>'btn btn-danger col-sm-6')) !!}
        </div>
        {!! Form::close() !!}

        @include('includes.form_error')

    </div>

@stop