<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function nuevoRol()
    {
        $role= new Role;
        $role->name= request()->rolNew;
        $role->save();

        return redirect()->back();
    }
}