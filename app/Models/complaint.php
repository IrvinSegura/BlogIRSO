<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    protected $table = 'complaint';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'description',
        'status',
    ];
}
