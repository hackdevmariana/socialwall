<div class="sidebar-content">
    <h5>Categorías destacadas</h5>
    <ul>
        @foreach(App\Models\Category::all() as $category)
            <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
