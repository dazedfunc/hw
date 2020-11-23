@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
{{--    {{ Form::open(array('action' => 'PostController@store', 'method' => 'post')) }}--}}
{{--    echo Form::text('email', 'example@gmail.com')--}}
{{--    {{ Form::close() }}--}}



     {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['class'=> 'form-control', 'placeholder' => 'Body'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}


@endsection
