@extends('layouts.admin')

@section('title', 'Детальніше про точку')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4">Інформація про точку: <span class="text-primary">{{ $places->title }}</span></h2>
            <div class="card shadow-sm mb-5">
                <div class="card-body">
                    <h5><strong>Назва точки:</strong> {{ $places->title }}</h5>
                    <p><strong>Опис:</strong> {{ $places->description }}</p>
                    <p><strong>Координати:</strong> {{ $places->lat }}, {{ $places->lng }}</p>
                    <p><strong>Користувач:</strong> <span class="text-secondary">{{ $places->user->name }}</span></p>
                    <p><strong>Створено:</strong> {{ $places->created_at->format('d.m.Y H:i') }}</p>
            @if($places->path)
                <img src="{{ asset('storage/' . $places->path) }}" alt="Фото" class="img-fluid rounded mt-3" style="max-width: 400px;">
            @endif
                </div>
            </div>
            <h3 class="mb-3">Коментарі</h3>
            @if($comments->isEmpty())
                <p class="text-muted fst-italic">Коментарів немає.</p>
            @else
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-start">
                            <div>
                                <strong class="me-2">{{ $comment->user->name ?? 'Анонімно' }}:</strong>
                                <p class="mb-1">{{ $comment->content }}</p>
                            </div>
                            <small class="text-muted text-nowrap">{{ $comment->created_at->format('d.m.Y H:i') }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        <div class="mt-2">
            {{ $comments->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
