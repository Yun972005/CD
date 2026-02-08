@extends('plantilla')

@section('titol', 'Login')

@section('contingut')
    <h1>Login</h1>

    @error('login')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login" id="login" value="{{ old('login') }}">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-dark btn-block">Enviar</button>
    </form>
@endsection
