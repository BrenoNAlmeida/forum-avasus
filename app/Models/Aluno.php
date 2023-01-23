<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends User
{
    use HasFactory;

    public function Subforum()
    {
        return $this->hasMany(Subforum::class);
    }

    public function Post()
    {
        return $this->hasMany(Post::class);
    }
    
    public function Resposta()
    {
        return $this->hasMany(Comentario::class);
    }
}
    