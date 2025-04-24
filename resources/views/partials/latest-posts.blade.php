<ul>
    @foreach(App\Models\Post::latest()->take(5)->get() as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Imagen de {{ $post->title }}" style="max-width: 200px;">
            <p>Por <strong>{{ $post->user ? $post->user->name : 'Pobrecito hablador' }}</strong></p>

            <p>{{ Str::limit($post->content, 100, '...') }}</p>
        </li>
    @endforeach
</ul>
