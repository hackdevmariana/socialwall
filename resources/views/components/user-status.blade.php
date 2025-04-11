@if (Auth::check())
    <p>Hola, {{ Auth::user()->name }}!</p>
@else
    <a href="{{ route('login') }}" class="btn btn-primary">Entrar</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Nuevo usuario</a>
@endif
