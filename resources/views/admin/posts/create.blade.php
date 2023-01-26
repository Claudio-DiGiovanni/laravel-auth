@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('admin.posts.store') }}">
    @csrf
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
        @error('slug')
            <div class="invalid-feedback">
                <ul>
                    @foreach ($errors->get('slug') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
        @error('title')
            <div class="invalid-feedback">
                <ul>
                    @foreach ($errors->get('title') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">URL immagine</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">
                <ul>
                    @foreach ($errors->get('image') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenuto del post</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"></textarea>
        @error('content')
            <div class="invalid-feedback">
                <ul>
                    @foreach ($errors->get('content') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <input type="text" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">
        @error('excerpt')
            <div class="invalid-feedback">
                <ul>
                    @foreach ($errors->get('excerpt') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
</form>
</div>
@endsection
