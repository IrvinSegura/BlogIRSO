<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Publication;

class CommentController extends Controller
{
    //
    public function crearComentario(Request $request){
        $user_id= auth()->user()->id;
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $user_id;
        $comment->publication_id = $request->publication_id;
        $comment->save();
        echo "Comentario creado";
    }
}
