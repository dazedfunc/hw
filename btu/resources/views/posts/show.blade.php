@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <hr>
    <h1>{{$post->title}}</h1>
    <hr>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Published on {{$post->created_at}}</small>
    <hr>
    <a href="/posts{{$post->id}}/edit" class="btn btn-default">Edit</a>

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'float-right']) !!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!! Form::close()!!}

@endsection
