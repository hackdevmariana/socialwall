@if (Auth::check())
    <p>Hola, {{ Auth::user()->name }}</p>
@else
    <a href="{{ route('login') }}" >Entrar</a>&nbsp; &nbsp; | &nbsp; &nbsp; 
    <a href="{{ route('register') }}" >Nuevo usuario</a>
@endif
