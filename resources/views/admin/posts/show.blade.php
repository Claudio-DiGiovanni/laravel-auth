@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img class="float-start px-5" src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>
            {{ $post->content }}
        </p>
        @auth
        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning">Edita</a>
        <form class="form-check form-check-inline" action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Elimina</button>
        </form>
        @endauth
    </div>
@endsection
