@extends('layouts.default')

@section('header')

@endsection

@section('maincontent')
    <div class="container mt-5">
        <div class="card mx-auto" style="width: 50rem;">
            @if($post->image)
                <div class="image-container">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image">
                </div>
            @endif
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="text-muted">By {{ $post->user->name }} | {{ $post->created_at->format('F j, Y') }}</p>
                <p class="card-text">{{ $post->body }}</p>

                @if(auth()->check() && auth()->user()->id == $post->user_id)
                    <div class="d-flex align-items-center">
                        <a href="{{ route('edit-post', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('delete-post', $post->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                @endif

                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection