@extends('layouts.default')

@section('header')
@endsection

@section('maincontent')
    <div class="container text-center">
        <h1 class="mb-4">Welcome to My Website! 🎉</h1>
        <h2 class="lead">👋 Hi! My name is Iana.</h2>
        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item">✅ Create an account and manage your profile.</li>
            <li class="list-group-item">✅ Write and share your thoughts.</li>
            <li class="list-group-item">✅ Edit or delete your posts anytime.</li>
            <li class="list-group-item">✅ See posts from all users on the homepage.</li>
        </ul>

        <p>I built this site using Laravel for the backend, MySQL for the database and Bootstrap for clean and modern
            design.
            Enjoy using the platform and start posting today! 🚀</p>
        <div>
            <h2 class="mt-5">All Posts 📢</h2>
            <div class="row mt-3">
                @include('post-card')
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection