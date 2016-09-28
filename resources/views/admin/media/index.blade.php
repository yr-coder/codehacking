@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Original Filename</th>
            <th>Size</th>
            <th>Uploaded</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)

            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}" alt=""></td>
                    <td>{{substr($photo->file, 18)}}</td>
                    <td>{{File::size(public_path().$photo->file)}}</td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>

                </tr>

            @endforeach

        @endif

        </tbody>

    </table>


    @stop