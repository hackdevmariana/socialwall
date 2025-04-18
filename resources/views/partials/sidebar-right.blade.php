<div class="sidebar-content">
    <h5>Últimos posts</h5>
    <ul>
        @foreach(App\Models\Post::latest()->take(5)->get() as $post)
            <li><a href="#">{{ $post->title }}</a></li>
        @endforeach
    </ul>
</div>
