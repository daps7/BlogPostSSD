@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">
        <h1 class="text-5xl font-bold text-center mb-10">About Us</h1>
        <section class="mb-10">
            <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
            <p>Our mission is to provide high-quality content and resources for our users.</p>
        </section>
        <section class="mb-10">
            <h2 class="text-3xl font-bold mb-4">Our Team</h2>
            <p>We are a group of passionate individuals dedicated to delivering the best experience for our users.</p>
        </section>
        <section>
            <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
            <p>If you have any questions or feedback, feel free to <a href="/contact" class="text-blue-500">contact us</a>.</p>
        </section>
    </div>
@endsection
