<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PublicationController extends Controller
{
    //
    public function index()
    {
        $publicationes = Publication::all();
        $category = DB::table('category')->get();
        $user = DB::table('users')->get();
        $user_id = auth()->user()->id;
        return view('Admin/adminPublicaciones', compact('publicationes', 'category', 'user', 'user_id'));
    }

    public function hola1(Request $request)
    {
        try{
            $user_id = auth()->user()->id;
            $slug = str_replace(' ', '-', $request->title);
            $slug_u = strtolower($slug);    
    
            $publication = new Publication();
            $publication->title = $request->title;
            $publication->category_id = $request->category_id;
            $publication->content = $request->content;
            $publication->title = $request->title;
            $publication->category_id = $request->category_id;
            $publication->content = $request->content;
            
            $originalName = $request->file('src_img')->getClientOriginalName();
            
            $request->file('src_img')->storeAs('public', $originalName);
            
            $publication->src_img = $originalName;
            
            $publication->user_id = $user_id;
            $publication->status = 'publicado';
            $publication->slug = $slug_u;
            $publication->save();
            $publication = DB::table('publications')->get();
            $category = DB::table('category')->get();
            $user = DB::table('users')->get();
            
            Session::flash('success', 'Datos enviados correctamente');
            return view('home', compact('publication', 'category', 'user'));
        }
        catch(\Exception $ex){
            return redirect()->route('home')->with('failed', $ex->getMessage());
        }
    }

    public function generarJson()
    {
        $publication = Publication::all();
        $json = json_encode($publication);
        $bytes = file_put_contents('publications.json', $json);
        $json = json_decode($json);
        echo "Se ha generado el archivo publications.json" . $bytes . " bytes en el directorio: " . getcwd();
    }

    public function mostrarCategoria()
    {
        $categoria = DB::table('category')->get();
        return view('/home', compact('category'));
    }

    public function publicacionPerfil()
    {
        $publicacionMostar = DB::table('publication')->get();
        return view('profile.show', compact('publicacionMostar'));
    }

    //que te diriga a adminCrearPublicaciones
    public function crearPublicaciones()
    {
        $category = DB::table('category')->get();
        $user = DB::table('users')->get();
        return view('Admin/adminCrearPublicaciones', compact('category', 'user'));
    }

    public function create (){

        $category =category::pluck('name','id');
        $tags = tag::all();

        return view('Admin.adminCrearPublicaciones', compact('category', 'tags'));
    }

    


}
