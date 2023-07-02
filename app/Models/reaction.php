<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reaction extends Model
{
    protected $table = 'reaction';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'type_reaction',
    ];
}
