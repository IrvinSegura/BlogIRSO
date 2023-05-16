<?php

namespace App\Http\Controllers;

use App\Models\category;
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

    public function mostrarUsuarios(){
        $users= DB::table('users')->get();
        return view ('Admin/adminUsuarios', compact('users'));
    }

    public function estadisticas(){
        $admin = DB::table('role')->where('name', 'admin')->count();
        $user = DB::table('role')->where('name', 'user')->count();
        $editor = DB::table('role')->where('name', 'editor')->count();
        return view('Admin/adminEstadisticas', compact('admin', 'user', 'editor'));
    }   
}
