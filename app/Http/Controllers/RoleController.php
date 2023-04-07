<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    //
    public function cantidadAdmins()
    {
        $cantidad_Admin = User::where('rol', '1')->count();
        return view('home', ['cantidad_Admin' => $cantidad_Admin]);
    }

    public function cantidadUsers()
    {
        $cantidad_User = User::where('rol', '2')->count();
        return view('home', ['cantidad_User' => $cantidad_User]);

    }

    public function cantidadEditors()
    {
        $cantidad_Editor = User::where('rol', '3')->count();
        return view('home', ['cantidad_Editor' => $cantidad_Editor]);
    }
}