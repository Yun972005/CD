@extends('plantilla')

@section('titol', 'Nou post')

@section('contingut')
    <h1>Crear nou post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titulo">Títol:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}">
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="contenido">Contingut:</label>
            <textarea class="form-control" name="contenido" id="contenido" rows="5">{{ old('contenido') }}</textarea>
            @error('contenido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear post</button>
    </form>
@endsection
