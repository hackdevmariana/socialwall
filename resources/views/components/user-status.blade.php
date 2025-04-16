@if (Auth::check())
    <p>Hola, <a href="{{ route('profile.edit') }}" >{{ Auth::user()->name }}</a>
@else
    <a href="{{ route('login') }}" >Entrar</a>&nbsp; &nbsp; | &nbsp; &nbsp; 
    <a href="{{ route('register') }}" >Nuevo usuario</a>
@endif
