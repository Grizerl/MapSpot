@extends('layouts.dashboard')

@section('title', 'Редагувати точку')

@section('content')
    <div class="container my-4" style="max-width: 700px;">
        <h2 class="mb-4">Редагувати точку</h2>
        <form action="{{ route('places.update', $place->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="mb-3">
            <label for="title" class="form-label">Назва <span class="text-danger">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $place->title) }}" class="form-control" placeholder="Введіть назву">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
                <textarea id="description" name="description" rows="4" class="form-control" placeholder="Опишіть точку">{{ old('description', $place->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                <label for="lat" class="form-label">Широта <span class="text-danger">*</span></label>
                    <input type="text" id="lat" name="lat" value="{{ old('lat', $place->lat) }}" class="form-control" placeholder="Приклад: 50.747">
                @error('lat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col">
                <label for="lng" class="form-label">Довгота <span class="text-danger">*</span></label>
                    <input type="text" id="lng" name="lng" value="{{ old('lng', $place->lng) }}" class="form-control" placeholder="Приклад: 25.325">
                @error('lng')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="mb-3">
            <label for="path" class="form-label">Фото</label>
                <input type="file" id="path" name="path" class="form-control">
            @error('path')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                @if($place->path)
                    <img src="{{ asset('storage/' . $place->path) }}" alt="Фото" class="img-thumbnail mt-3" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Змінити дані</button>
        </form>
    </div>
@endsection
