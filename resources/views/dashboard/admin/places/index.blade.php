@extends('layouts.admin')

@section('title', 'Всі точки')

@section('content')
    <div class="container">
        <h2>Точки користувачів</h2>
            @foreach($places as $place)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $place->title }}</h5>
                        <p>{{ $place->description }}</p>
                        <p><strong>Користувач який створив точку:</strong> {{ $place->user->name }}</p>
                        <a href="{{ route('points.show', $place->id) }}" class="btn btn-sm btn-info">Детальніше</a>
                        <a href="{{ route('points.edit', $place->id) }}" class="btn btn-sm btn-primary">Редагувати</a>
                        <form action="{{ route('points.destroy', $place->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Видалити точку?')">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-sm btn-danger">Видалити</button>
                        </form>
                    </div>
                </div>
            @endforeach
        {{ $places->links('pagination::bootstrap-4') }}
    </div>
@endsection
