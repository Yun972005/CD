@extends('plantilla')

@section('titol', 'Editar post')

@section('contingut')
    <h1>Editar post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titulo">Títol:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo', $post->titulo) }}">
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="contenido">Contingut:</label>
            <textarea class="form-control" name="contenido" id="contenido" rows="10">{{ old('contenido', $post->contenido) }}</textarea>
            @error('contenido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualitzar post</button>
    </form>
@endsection
