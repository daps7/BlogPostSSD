@extends('layouts.app')

@section('content')
    <h1>Your Favorite Posts</h1>
    @foreach($posts as $post)
        <div>
            <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->description }}</p>
        </div>
    @endforeach
@endsection
