<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Usuari;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = Usuari::all();
        foreach ($usuarios as $usuario) {
            // Fem 3 posts per cada usuari de prova
            for ($i = 1; $i <= 3; $i++) {
                $post = new Post();
                $post->titulo = "Títol de prova $i per a " . $usuario->login;
                $post->contenido = "Contingut de prova detallat per al post número $i de l'usuari " . $usuario->login . ". Aquest contingut s'ha creat de forma manual per a evitar l'ús de funcions generadores de text aleatori.";
                $post->usuari_id = $usuario->id;
                $post->save();

                // Aquí creem els 3 comentaris per post que demana l'exercici 3
                for ($j = 1; $j <= 3; $j++) {
                    $comentari = new \App\Models\Comentari();
                    $comentari->contingut = "Comentari de prova $j per al post de " . $usuario->login;
                    $comentari->usuari_id = $usuarios->random()->id; // agafem un usuari a l'atzar
                    $comentari->post_id = $post->id;
                    $comentari->save();
                }
            }
        }
    }
}
