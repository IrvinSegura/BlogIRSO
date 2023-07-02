<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save_publication extends Model
{
    protected $table = 'save_publication';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'status',
    ];
}
