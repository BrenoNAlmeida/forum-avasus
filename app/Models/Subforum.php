<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subforum extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'ativo',
    ];

    public function Professor()
    {
        return $this->belongsTo(Professor::class);
    }
    
    public function Aluno()
    {
        return $this->hasMany(Aluno::class);
    }
    
    public function Post()
    {
        return $this->hasMany(Post::class);
    }
}