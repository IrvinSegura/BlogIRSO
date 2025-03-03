<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'comment',
    ];
}
