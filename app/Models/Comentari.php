<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentari extends Model
{
    protected $fillable = ['contingut', 'usuari_id', 'post_id'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
