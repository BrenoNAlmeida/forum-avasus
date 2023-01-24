<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    public function Subforum()
    {
        return $this->hasMany(Subforum::class);
    }
    public function User ()
    {
        return $this->belongsTo(User::class);
    }

}
