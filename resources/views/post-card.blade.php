@foreach($posts as $post)
    <a href="{{ route('user-post', ['post' => $post->id])}}" class="col-md-4 mb-4 text-decoration-none text-dark">
        <div class="card shadow-sm" style="width: 350px;">
            @if($post->image)
                <div class="image-container">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image">
                </div>
            @endif
            <div class="card-body">
                <h5 class='card-title'>{{ $post->title }} <span class="custom-user-name">by {{ $post->user->name }}</span>
                </h5>
                <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                <p>{{ $post->created_at }}</p>

                @auth
                    @if(auth()->check() && auth()->user()->id == $post->user_id)
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('edit-post', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('delete-post', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="d-grid">
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </a>
@endforeach