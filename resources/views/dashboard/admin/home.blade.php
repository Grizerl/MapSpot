@extends('layouts.admin')

@section('title', 'Адмін панель')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Адмін панель</h1>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Зареєстровані користувачі</h5>
                    <p class="card-text display-4">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Точки</h5>
                    <p class="card-text display-4">{{ $placesCount }}</p>
                    <a href="{{ route('points.index') }}" class="btn btn-light">Переглянути точки</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection