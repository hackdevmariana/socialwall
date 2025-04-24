@foreach(App\Models\Post::latest()->take(5)->get() as $post)
            <li><a href="#">{{ $post->title }}</a></li>
        @endforeach