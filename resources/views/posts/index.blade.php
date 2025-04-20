<!-- resources/views/posts/index.blade.php -->
@extends('layout')

@section('content')
    <h1>Lista de Publicaciones</h1>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
@endsection
