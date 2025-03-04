@extends ('layouts.default')

@section('header')

@endsection

@section('maincontent')

    @auth
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1>Hello {{ ucfirst(auth()->user()->name) }}</h1>
            </div>
            @include('create-post')
            <div class="container">
                <h3 class="mt-4">My Posts</h3>
                <div class="row mt-3">
                    @include('post-card')
                </div>
            </div>
    @else
            <div class="text-center">
                <p class="lead">You need to <a href="{{ route('register') }}">register</a> or <a
                        href="{{ route('login') }}">login</a> to access this page.</p>
            </div>
        </div>

    @endauth
@endsection

@section('footer')

@endsection