<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'post_id',
        'texto',
        'created_at',
    ];

    public function Aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
