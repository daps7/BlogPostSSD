@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-bold" style="font-family: Calibri;">
            Blog Posts
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-10">
    <!-- Search, Sort, and Filter Form -->
    <form method="GET" action="{{ route('blog.index') }}">
        <div class="form-group">
            <input type="text" name="search" class="form-control search-bar" placeholder="Search posts..." value="{{ request()->input('search') }}">
        </div>
        <div class="form-group">
            <select name="sort" class="form-control">
                <option value="updated_at" {{ request()->input('sort') == 'updated_at' ? 'selected' : '' }}>Sort By</option>
                <option value="title" {{ request()->input('sort') == 'title' ? 'selected' : '' }}>Title</option>
                <option value="created_at" {{ request()->input('sort') == 'created_at' ? 'selected' : '' }}>Date Created</option>
            </select>
            <select name="direction" class="form-control">
                <option value="asc" {{ request()->input('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request()->input('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary apply-button">Apply</button>
    </form>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl create-button">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y H:i', strtotime($post->created_at)) }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-bold">
                {{ Str::limit($post->description, 150) }}
            </p>

            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl keep-reading-button">
                Keep Reading
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a 
                        href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            @endif
        </div>
    </div>    
@endforeach

@endsection

<style>
    .search-bar {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        margin-bottom: 10px;
    }

    .apply-button, .create-button, .keep-reading-button, .edit-button, .delete-button {
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .apply-button {
        background-color: #007bff;
        color: white;
    }

    .create-button {
        background-color: #28a745;
        color: white;
    }

    .keep-reading-button {
        background-color: #17a2b8;
        color: white;
    }

    .edit-button {
        background-color: #ffc107;
        color: black;
    }

    .delete-button {
        background-color: #dc3545;
        color: white;
    }

    .apply-button:hover, .create-button:hover, .keep-reading-button:hover, .edit-button:hover, .delete-button:hover {
        opacity: 0.8;
    }
</style>