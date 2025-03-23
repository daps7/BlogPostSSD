@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto w-3/5">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-black text-5xl font-bold text-shadow-md pb-14">
                    <span class="text-black">FootyInsights Your #1 Football Blogsite</span>
                </h1>
                
                <h2 class="text-black font-bold">Welcome to the football blog site your one stop shop for all things football. 
                    Our many journalists scattered across all major leagues are here to report to you.</h2>
            </div>
        </div>
        <img src="{{ asset('images/FootyInsights.jpg') }}" alt="Footy Insights" class="w-full h-auto mb-10">
        <hr class="my-4">
        <div class="text-center p-15 text-black mx-auto w-full">
            <div class="text-center w-auto mx-auto">
                <h2 class="text-2xl pb-5 text-l"> 
                    We're experts in...
                </h2>

                <span class="font-extrabold block text-4xl py-1">
                    Transfers
                </span>
                <span class="font-extrabold block text-4xl py-1">
                    Injury news
                </span>
                <span class="font-extrabold block text-4xl py-1">
                    Player form
                </span>
                <span class="font-extrabold block text-4xl py-1">
                    Team news
                </span>
            </div>
        </div>

        <div class="text-center w-auto mx-auto">
            <a 
                href="/blog"
                class="text-black py-2 px-4 font-bold text-xl inline-block">
               Click Me For The Latest Blogs
            </a>
        </div>
    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div>
@endsection
