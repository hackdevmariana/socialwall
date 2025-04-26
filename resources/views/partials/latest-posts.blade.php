<div class="latest-posts">
<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Imagen de {{ $post->title }}" style="max-width: 200px;">
            @endif
            <p>Por <strong>{{ $post->user ? $post->user->name : 'Pobrecito hablador' }}</strong></p>

            <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p> <!-- Evita mostrar etiquetas HTML -->
        </li>
    @endforeach
</ul>
</div>
