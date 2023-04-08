<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function index(){
        $publications= DB::table('publications')->get();
        return view ('Admin/adminPublicaciones', compact('publications'));
    }

    public function hola(){
        $categorias= DB::table('category')->get();
        $activeUsers = DB::table('users')->count();
        $totalPost = Publication::all()->count();
        return view ('home', compact('categorias', 'activeUsers', 'totalPost'));
    }

    public function mostrarUsuarios(){
        $users= DB::table('users')->get();
        return view ('Admin/adminUsuarios', compact('users'));
    }

    
}
