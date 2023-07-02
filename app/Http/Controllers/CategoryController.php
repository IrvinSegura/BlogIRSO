<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function verCategoria()
    {
        $category = DB::table('category')->get();
        return view('Admin.adminCategorias', compact('category'));
    }

    public function index()
    {
        return view('Admin.adminCategorias');
    }

    public function sendCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->back();
    }

    public function nuevoNombre()
    {
        $category = DB::table('category')->get();
        $request = request();
        $category = DB::table('category')
            ->select('name')
            ->where('id', $request->id)
            ->update(['name' => $request->nameNew]);

        return redirect()->back();
    }

    public function eliminar(Request $request)
    {
        $categoryId = $request->id;
        DB::table('category')->where('id', $categoryId)->delete();

        return redirect()->back();
    }

    public function view()
    {
        return view('Admin.adminCategorias');
    }
}
