@extends('layouts.admin')

@section('title', 'Змінити дані про точку')

@section('content')
<div class="container">
    <h2>Редагування точки</h2>
    <form action="{{ route('points.update', $places->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="mb-2">
                <label>Назва</label>
                <input type="text" name="title" value="{{ old('title', $places->title) }}" class="form-control">
            </div>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label>Опис</label>
                <textarea name="description" class="form-control">{{ old('description', $places->description) }}</textarea>
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label>Широта</label>
                <input type="text" name="lat" value="{{ old('lat', $places->lat) }}" class="form-control">
            </div>
            @error('lat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label>Довгота</label>
                <input type="text" name="lng" value="{{ old('lng', $places->lng) }}" class="form-control">
            </div>
            @error('lng')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="path" class="form-label">Фото</label>
                <input type="file" id="path" name="path" class="form-control">
            @error('path')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                @if($places->path)
                    <img src="{{ asset('storage/' . $places->path) }}" alt="Фото" class="img-thumbnail mt-3" style="max-width: 200px;">
                @endif
            </div>
        <button class="btn btn-success">Оновити</button>
    </form>
</div>
@endsection
