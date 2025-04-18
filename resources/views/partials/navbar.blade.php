<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="left">
            <a href="{{ route('home') }}" class="logo-link">
                @php
                    $logo = App\Models\Logo::first();
                @endphp
        
                @if ($logo)
                    <x-logo :logo="$logo" />
                @endif
            </a>
        </div>

        <div class="middle d-flex flex-grow-1 justify-content-center gap-3">
            <a class="nav-link" href="#">Sección 1</a>
            <a class="nav-link" href="#">Sección 2</a>
            <a class="nav-link" href="#">Sección 3</a>
        </div>

        <div class="right">
            <x-user-status />
            <x-color-mode />
        </div>
    </div>
</nav>
