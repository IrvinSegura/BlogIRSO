<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag_publication extends Model
{
    protected $table = 'tag_publication';
    use HasFactory;
    protected $fillable = [
        'tag_id',
        'publication_id',
    ];
}
