@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)

            <div class="card card-body bg-light">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Published on {{$post->created_at}}</small>
            </div>
        @endforeach
        <hr>
        {{$posts->links('pagination::bootstrap-4')}}
        <hr>
    @else
    <p>no posts found</p>
    @endif

@endsection
