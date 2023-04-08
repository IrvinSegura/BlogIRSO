<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;


class PublicationController extends Controller
{
    //
    public function index(){
        $comment = DB::table('comments')->get();
        $publication = DB::table('publications')->get();
        $category= DB::table('category')->get();
        $user = DB::table('users')->get();
        $user_id = auth()->user()->id;
        return view('Admin/adminPublicaciones', compact('publication', 'category', 'user', 'comment', 'user_id'));
    }

    public function hola1(Request $request){
        $user_id= auth()->user()->id;
        $slug = str_replace(' ', '-', $request->title);

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->category_id = $request->category_id;
        $publication->content = $request->content;
        $publication->src_img = $request->src_img;
        $publication->user_id = $user_id;
        $publication->status = 'publicado' ;
        $publication->slug = $slug;
        $publication->save();


        $publication = DB::table('publications')->get();
        $category= DB::table('category')->get();
        $user = DB::table('users')->get();
        return view('Admin/adminPublicaciones', compact('publication', 'category', 'user'));
    }

    public function generarJson(){
        $publication = Publication::all();
        $json = json_encode($publication);
        $bytes = file_put_contents('publications.json', $json);
        $json = json_decode($json);
        echo "Se ha generado el archivo publications.json".$bytes." bytes en el directorio: ".getcwd();

    } 
    
}
