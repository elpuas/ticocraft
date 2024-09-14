@extends('layouts.app')

@section('content')
    <h1>Crear Usuario</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            @csrf
            <label for="name">Nombre</label>
            <input
                id="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                autofocus
            >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">@username</label>
            <input
                id="username"
                type="text"
                class="form-control @error('username') is-invalid @enderror" name="username"
                value="{{ old('username') }}"
                required
                autocomplete="username"
                autofocus
            >
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input
                id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
            >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input
                id="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror" name="password"
                required
                autocomplete="new-password"
            >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirmar Contraseña</label>
            <input
                id="password-confirm"
                type="password"
                class="form-control"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >
        </div>
        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
    </form>
@endsection
