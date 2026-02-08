<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['titulo', 'contenido', 'usuari_id'];

    // Relació: un post pertany a un usuari
    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }

    // Relació: un post pot tenir molts comentaris
    public function comentaris()
    {
        return $this->hasMany(Comentari::class, 'post_id');
    }
}
