<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubforum extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subforum_id',
    ];

    protected $table = 'user_subforum';

}
