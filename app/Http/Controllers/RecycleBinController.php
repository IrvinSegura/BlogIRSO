<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Role;

class RecycleBinController extends Controller
{
    //
    public function view(){
        $category= DB::table('category')->get();
        $users = DB::table('users')->get();
        $role= DB::table('role')->get();
       return view('Admin.adminPapeleraReciclaje', compact('users', 'role', 'category'));
    }

    public function restaurarCategoria(){
        $request = request();
        try{
            $category = Category::onlyTrashed()->find($request->id);

            if($category){
                $category->restore();
                Session::flash('success', 'Categoria restaurada correctamente');
                return redirect()->back();
            }
            else{
                Session::flash('failed', 'Categoria no encontrada');
                return redirect()->back();
            }
        }catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
        return redirect()->back();
    }

    public function restaurarRol(){
        $request = request();
        try{
            $role = Role::onlyTrashed()->find($request->id);

            if($role){
                $role->restore();
                Session::flash('success', 'Rol restaurado correctamente');
                return redirect()->back();
            }
            else{
                Session::flash('failed', 'Rol no encontrado');
                return redirect()->back();
            }
        }catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
        return redirect()->back();
    }
}
