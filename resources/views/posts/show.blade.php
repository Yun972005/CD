@extends('plantilla')

@section('titol', 'Fitxa post')

@section('contingut')
    {{-- Mostrem el títol del post --}}
    <h1>{{ $post->titulo }}</h1>
    @auth
        @if($post->usuari_id == auth()->id())
            <p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Editar</a>
            </p>
        @endif
    @endauth
    <p>Creat per: <strong>{{ $post->usuari->login ?? 'Anònim' }}</strong></p>
    <p>{{ $post->contenido }}</p>
    <small>Creat el: {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</small>

    <hr>
    {{-- TODO: posar un botó per afegir comentari açí mateix --}}
    <h3>Comentaris</h3>
    <ul>
        @forelse ($post->comentaris as $comentari)
            <li>
                <strong>{{ $comentari->usuari->login ?? 'Anònim' }}</strong> ({{ \Carbon\Carbon::parse($comentari->created_at)->format('d/m/Y') }}):
                <p>{{ $comentari->contingut }}</p>
            </li>
        @empty
            <li>No hi ha comentaris.</li>
        @endforelse
    </ul>
@endsection
