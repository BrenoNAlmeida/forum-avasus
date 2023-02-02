<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'ativo',
        'aluno_id',
        'subforum_id',
        'created_at',
    ];

    public function Aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function Subforum()
    {
        return $this->belongsTo(Subforum::class);
    }
}
