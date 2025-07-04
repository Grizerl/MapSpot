@extends('layouts.user')

@section('title', 'Детальніше')

@section('content')
    <div class="container my-4" style="max-width: 700px;">
        <h1 class="mb-4">{{ $places->title }}</h1>
            @if($places->path)
                <img src="{{ asset('storage/' . $places->path) }}" alt="{{ $places->title }}" class="img-fluid rounded mb-4" style="max-width: 100%; max-height: 400px; object-fit: cover;">
            @endif
        <p><strong>Опис:</strong> {{ $places->description }}</p>
        <p><strong>Широта:</strong> {{ $places->lat }}</p>
        <p><strong>Довгота:</strong> {{ $places->lng }}</p>
        <hr>
        <h3 class="mb-3">Коментарі</h3>
        <form method="post" action="{{ route('places.comments.store', $places->id) }}" class="mb-4">
            @csrf
            <div class="mb-3"> <textarea name="content" class="form-control" rows="3" placeholder="Залишити коментар...">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <div class="text-danger mb-3">{{ $message }}</div>
            @enderror
        <button type="submit" class="btn btn-primary">Надіслати</button>
        </form>
        @foreach ($comments as $comment)
            <div class="mb-3 p-3 border rounded">
                <p class="mb-1">{{ $comment->content }}</p>
                <small class="text-muted">Коментар створено: {{ $comment->created_at }}</small>
            </div>
        @endforeach
        {{ $comments->links('pagination::bootstrap-4') }}
        <hr>
        <div class="d-flex gap-3">
            <a href="{{ route('places.edit', $places->id) }}" class="btn btn-warning">Редагувати</a>
            <form action="{{ route('places.destroy', $places->id) }}" method="post" onclick="return confirm('Впевнені, що хочете видалити цю точку?');">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Видалити</button>
            </form>
        </div>
    </div>
@endsection
