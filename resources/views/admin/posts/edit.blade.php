@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.update', ['post' => $post])}}" method="POST">
        @csrf
        @method('put')
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" value="{{$post->title}}" class="form-control" name="title" id="title">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">URL immagine</label>
            <input type="text" value="{{$post->image}}" class="form-control" name="image" id="image">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" name="content" id="content"  rows="3">{{$post->content}}</textarea>
          </div>
          <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <input type="text" value="{{$post->excerpt}}" class="form-control" name="excerpt" id="excerpt">
          </div>
          <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
</div>
@endsection
