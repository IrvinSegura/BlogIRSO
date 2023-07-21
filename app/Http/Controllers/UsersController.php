<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class UsersController extends Controller
{
    //
    public function index()
    {
        $publications = DB::table('publications')->get();
        return view('Admin/adminPublicaciones', compact('publications'));
    }

    public function mostrarUsuarios()
    {
        $users = DB::table('users')->get();
        $role = DB::table('role')->get();
        return view('Admin/adminUsuarios', compact('users', 'role'));
    }

    public function mostrarEstadisticas()
    {
        $cantidad_Admin = DB::table('users')->where('rol', 1)->count();
        $cantidad_Editor = DB::table('users')->where('rol', 2)->count();
        $cantidad_User = DB::table('users')->where('rol', 3)->count();
        return view('Admin/adminEstadisticas', compact('cantidad_Admin', 'cantidad_Editor', 'cantidad_User'));
    }

    public function usuarioPerfil()
    {
        try {
            $user = Auth::user();
            return view('User/userPerfil', compact('user'));
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('failed', $ex->getMessage());
        }
    }

    public function editarUsuario()
    {
        $request = request();
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol = $request->rol;
            $user->save();

            Session::flash('success', 'Datos enviados correctamente');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->route('usuarios')->with('failed', $ex->getMessage());
        }
    }

    public function eliminarUsuario()
    {
        $request = request();
        try {
            $user = User::find($request->id);

            if ($user) {
                $user->delete();
                Session::flash('success', 'Usuario eliminado correctamente');
            } else {
                Session::flash('failed', 'No se encontró el usuario');
            }

            return redirect()->back();
        } catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
    }

    public function agregarUsuario()
    {
        $request = request();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol = $request->rol;
            $user->password = bcrypt($request->password);
            $user->save();

            Session::flash('success', 'Usuario agregado correctamente');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->route('usuarios')->with('failed', $ex->getMessage());
        }
    }

    public function usuariosEliminados()
    {
        $usersDeleted = User::onlyTrashed()->get();
        foreach ($usersDeleted as $user) {
            "<td>" . $user->name . "</td>";
            "<td>" . $user->email . "</td>";
            "<td>" . $user->rol . "</td>";
        }
    }

    public function usuariosOcultos(){
        $users = User::onlyTrashed()->get();
        $role = DB::table('role')->get();
        return view('Admin/adminUsuariosOcultos', compact('users', 'role'));
    }

    public function restaurarUsuario()
    {
        $request = request();
        try {
            $user = User::onlyTrashed()->find($request->id);

            if ($user) {
                $user->restore();
                Session::flash('success', 'Usuario restaurado correctamente');
            } else {
                Session::flash('failed', 'No se encontró el usuario');
            }

            return redirect()->back();
        } catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
    }
}
