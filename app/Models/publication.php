<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'src_img',
        'user_id',
        'category_id',
        'status',
        'content',
    ];
    public function comments(){
        return $this->hasMany(Comment::class,'publication_id');
    }
}
