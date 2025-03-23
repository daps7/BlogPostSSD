@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Your Favourites</h1>
    @if($favorites->isEmpty())
        <p>You have no favourited blogs.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($favorites as $favorite)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">{{ $favorite->title }}</h2>
                    <p class="text-gray-700">{{ $favorite->excerpt }}</p>
                    <a href="{{ route('blog.show', ['slug' => $favorite->slug]) }}" class="text-blue-500 hover:underline mt-4 block">Read more</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
