<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        $category = Category::all();
        $user_id = auth()->user()->id;
        $user = User::all();
        return view('Admin/adminPublicaciones', compact('publications', 'category', 'user_id', 'user'));
    }

    public function hola1(Request $request)
    {
        try {
            if (!auth()->check()) {
                return redirect()->route('home')->with('failed', 'Usuario no autenticado.');
            }

            $slug = str_replace(' ', '-', $request->title);
            $slug_u = strtolower($slug);
            $users = User::all();
            $publication = new Publication();
            $publication->title = $request->title;
            $publication->category_id = $request->category_id;
            $publication->content = $request->content;
            $publication->user_id = auth()->user()->id;
            $publication->status = 'publicado';
            $publication->slug = $slug_u;

            if ($request->hasFile('src_img')) {
                $originalName = $request->file('src_img')->getClientOriginalName();
                $request->file('src_img')->storeAs('public', $originalName);
                $publication->src_img = $originalName;
            }

            $publication->save();

            Session::flash('success', 'Datos enviados correctamente');
            return view('home');
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('failed', $ex->getMessage());
        }
    }

    public function generarJson()
    {
        $publications = Publication::all();
        $json = $publications->toJson(JSON_PRETTY_PRINT);
        $bytes = file_put_contents('publications.json', $json);
        echo "Se ha generado el archivo publications.json" . $bytes . " bytes en el directorio: " . getcwd();
    }

    public function mostrarCategoria()
    {
        $category = Category::all();
        return view('home', compact('category'));
    }

    public function publicacionPerfil()
    {
        $publicacionMostar = Publication::all();
        return view('profile.show', compact('publicacionMostar'));
    }

    public function muestra()
    {
        $publications = Publication::all();
        $publications_recent = Publication::orderBy('created_at', 'desc')->take(4)->get();
        $category = Category::all();
        return view('Publications.publication', compact('publications', 'publications_recent', 'category'));
    }
}
