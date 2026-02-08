@extends('plantilla')

@section('titol', 'Llistat posts')

@section('contingut')
    <h1>Llistat de posts</h1>
    <ul class="list-group">
        @forelse ($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $post->titulo }} ({{ $post->usuari->login ?? 'Anònim' }})
                <div>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Veure</a>
                    @auth
                        @if($post->usuari_id == auth()->id())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Esborrar</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </li>
        @empty
            <li class="list-group-item">No hi ha posts</li>
        @endforelse
    </ul>
    <br>
    {{-- Paginació dels posts --}}
    {{ $posts->links() }}
@endsection
