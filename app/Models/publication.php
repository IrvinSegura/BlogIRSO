<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;

class publication extends Model
{
<<<<<<< HEAD
    protected $table = 'publication';
=======
    use SoftDeletes;
    protected $table = 'publications';
>>>>>>> b1eccc9876013e6f4256b4c692bb0b0fb632951d
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

    public function getSrcImgUrlAttribute()
    {
        return asset('storage/' . $this->src_img);
    }

}
