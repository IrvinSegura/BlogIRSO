<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function index(){
        $publications= DB::table('publications')->get();
        return view ('Admin/adminPublicaciones', compact('publications'));
    }

    public function hola(){
        $categorias= DB::table('category')->get();
        return view ('home', compact('categorias'));
    }

    
}
