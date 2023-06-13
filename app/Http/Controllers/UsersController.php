<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function mostrarEstadisticas(){
        $cantidad_Admin= DB::table('users')->where('rol', 1)->count();
        $cantidad_Editor= DB::table('users')->where('rol', 2)->count();
        $cantidad_User= DB::table('users')->where('rol', 3)->count();
        return view('Admin/adminEstadisticas', compact('cantidad_Admin', 'cantidad_Editor', 'cantidad_User'));
    }   

    public function usuarioPerfil(){
        try{
            $user= Auth::user();
            return view('User/userPerfil', compact('user'));
        }catch(\Exception $ex){
            return redirect()->route('home')->with('error', $ex->getMessage());
        }
    }
}
