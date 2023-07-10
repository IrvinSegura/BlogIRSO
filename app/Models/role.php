<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class role extends Model
{
    use SoftDeletes;
    protected $table = 'role';
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function getRoleName($id)
    {
        $role = role::find($id);
        return $role->name;
    }
    
}
