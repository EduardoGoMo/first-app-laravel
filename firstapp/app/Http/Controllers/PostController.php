<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // mostrar nueva publicación
    public function storeNewPost(Request $request){
        $entradas = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $entradas['title'] = strip_tags($entradas['title']);
        $entradas['body'] = strip_tags($entradas['body']);
        $entradas['user_id'] = auth()->id();

        Post::create($entradas);

        return 'post created';
    }

    // Función hacer una publicación
    public function showCreateForm(){

        return view('create-post');
    }

}
