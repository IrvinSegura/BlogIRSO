<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class category extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function getCategory(){
        return $this->hasMany(publication::class,'category_id');
    }
}
