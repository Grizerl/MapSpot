@extends('layouts.dashboard')

@section('title', 'Детальніше')

@section('content')
    <div class="container my-4" style="max-width: 700px;">
        <h1 class="mb-4">{{ $place->title }}</h1>
            @if($place->path)
                <img src="{{ asset('storage/' . $place->path) }}" alt="{{ $place->title }}" class="img-fluid rounded mb-4" style="max-width: 100%; max-height: 400px; object-fit: cover;">
            @endif
        <p><strong>Опис:</strong> {{ $place->description }}</p>
        <p><strong>Широта:</strong> {{ $place->lat }}</p>
        <p><strong>Довгота:</strong> {{ $place->lng }}</p>
        <hr>
        <h3 class="mb-3">Коментарі</h3>
        <form method="post" action="{{ route('places.comments.store', $place->id) }}" class="mb-4">
            @csrf
            <div class="mb-3"> <textarea name="content" class="form-control" rows="3" placeholder="Залишити коментар...">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <div class="text-danger mb-3">{{ $message }}</div>
            @enderror
        <button type="submit" class="btn btn-primary">Надіслати</button>
        </form>
        @foreach ($place->comments as $comment)
            <div class="mb-3 p-3 border rounded">
                <p class="mb-1">{{ $comment->content }}</p>
                <small class="text-muted">Коментар створено: {{ $comment->created_at }}</small>
            </div>
        @endforeach
        <hr>
        <div class="d-flex gap-3">
            <a href="{{ route('places.edit', $place->id) }}" class="btn btn-warning">Редагувати</a>
            <form action="{{ route('places.destroy', $place->id) }}" method="post" onclick="return confirm('Впевнені, що хочете видалити цю точку?');">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Видалити</button>
            </form>
        </div>
    </div>
@endsection
