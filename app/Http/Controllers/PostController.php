<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Usuari;
use App\Http\Requests\PostRequest;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ordenem per títol de la A a la Z
        $posts = Post::orderBy('titulo', 'asc')->paginate(5);
        // return dd($posts); // per veure que arriba
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        
        // Vinculem el post amb l'usuari que està loguejat
        $post->usuari()->associate(auth()->user());
        
        $post->save();
        // Redirigim a l'index després de guardar
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        
        // Validem que sigui el seu post
        // TODO: potser posar un missatge de error més bonic
        if ($post->usuari_id != auth()->id()) {
            return redirect()->route('posts.index')->withErrors(['auth' => 'No tens permís per a editar aquest post.']);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->usuari_id != auth()->id()) {
            return redirect()->route('posts.index')->withErrors(['auth' => 'No tens permís per a editar aquest post.']);
        }

        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->save();
        
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->usuari_id != auth()->id()) {
            return redirect()->route('posts.index')->withErrors(['auth' => 'No tens permís per a esborrar aquest post.']);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        $titulo = "Títol " . rand();
        $contenido = "Contingut " . rand();
        Post::create(['titulo' => $titulo, 'contenido' => $contenido]);
        return redirect()->route('posts.index');
    }

    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);
        $post->titulo = "Títol " . rand();
        $post->contenido = "Contingut " . rand();
        $post->save();
        return redirect()->route('posts.index');
    }
}
