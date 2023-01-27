<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

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
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
    