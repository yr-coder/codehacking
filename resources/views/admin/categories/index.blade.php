@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    @if(Session::has('deleted_category'))

        <p class="bg-success">{{session('deleted_category')}}</p>

    @endif

    <div class="col-sm-6">

        {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}


        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category',
              array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}

        @include('includes.form_error')


    </div>


    <div class="col-sm-6">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Created</th>

        </tr>
        </thead>
        <tbody>
        @if($categories)

            @foreach($categories as $category)

                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>

                </tr>

            @endforeach

        @endif

        </tbody>

    </table>

    </div>

@stop