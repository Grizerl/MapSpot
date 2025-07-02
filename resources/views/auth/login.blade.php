@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-body-tertiary p-4 rounded shadow-sm" style="max-width: 600px;">
  <form action="{{ route('login.submit') }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="Email address" class="form-label fw-semibold">Адреса електронної пошти</label>
        <input type="email" class="form-control fs-6" name="email" placeholder="......@gmail.com" autocomplete="email">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="Password" class="form-label fw-semibold">Пароль</label>
        <input type="password" class="form-control fs-6" name="password" placeholder="12345*****" autocomplete="new-password">
        @error('password')
          <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary w-100 fw-semibold" style="transition: background-color 0.3s ease;">
        Вхід
    </button>
  </form>
</div>
@endsection
