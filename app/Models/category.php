<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class category extends Model
{
    protected $table = 'category';
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function getCategory(){
        return $this->hasMany(publication::class,'category_id');
    }
}
