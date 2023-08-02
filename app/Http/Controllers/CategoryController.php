<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


class CategoryController extends Controller
{
    /*
    *
    *Funciones para el manejo de categorias
    *
    */

    public function verCategoria()
    {
        $category = DB::table('category')->get();
        return view('Admin.adminCategorias', compact('category'));
    }

    /*
    *
    *Funciones para el manejo de categorias
    *
    */

    public function index()
    {
        return view('Admin.adminCategorias');
    }

    public function sendCategory(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            Session::flash('success', 'Categoria creada correctamente');
        } catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
        return redirect()->back();
    }

    public function nuevoNombre(Request $request)
    {
        try {
            $category = Category::find($request->id);
            $category->name = $request->nameNew; 
            $category->save();

            Session::flash('success', 'Categoria renombrada correctamente');
        } catch (\Exception $ex) {
            Session::flash('failed', $ex->getMessage());
        }
        return redirect()->back();
    }

    public function eliminar(Request $request)
{
    try {
        $category = Category::find($request->id);

        $publicaciones = $category->publicaciones()->get();
        if ($publicaciones->count() > 0) {
            Session::flash('failed', 'No se puede eliminar la categoria porque tiene publicaciones asociadas');
        }

        $category->delete();
        Session::flash('success', 'Datos enviados correctamente');
    } catch (\Exception $ex) {
        Session::flash('failed', 'No se puede eliminar la categoria porque tiene publicaciones asociadas');
    }
    return redirect()->back();
}


    public function view()
    {
        return view('Admin.adminCategorias');
    }
}
