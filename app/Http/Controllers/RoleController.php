<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function view()
    {
        $users = DB::table('users')->get();
        $role = DB::table('role')->get();
        return view('Admin.adminRoles', compact('users', 'role'));
    }

    public function nuevoRol()
    {
        $request = request();
        try {
            $role = new Role();
            $role->name = $request->nameRol;
            $role->save();

            Session::flash('success', 'Rol agregado correctamente');
        } catch (\Exception $ex) {
            Session::flash('failed', 'Error al agregar el Rol');
        }

        return redirect()->back();
    }

    public function editarNombre()
    {
        $request = request();
        try {
            $role = Role::find($request->id);
            $role->name = $request->newRoleName;
            $role->save();

            Session::flash('success', 'Rol editado correctamente');
        } catch (\Exception $ex) {
            Session::flash('failed', 'Error al editar el Rol');
        }

        return redirect()->back();
    }

    public function eliminarRol()
    {
        $request = request();
        try {
            $role = Role::find($request->id);
            $role->delete();

            Session::flash('success', 'Rol eliminado correctamente');
        } catch (\Exception $ex) {
            Session::flash('failed', 'Error al eliminar el Rol');
        }

        return redirect()->back();
    }
}
