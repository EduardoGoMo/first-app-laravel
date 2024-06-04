<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Función crear una publicación
    public function showCreateForm(){
        return view('create-post');
    }

    // guardar nueva publicación
    public function storeNewPost(Request $request){
        $entradas = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $entradas['title'] = strip_tags($entradas['title']);
        $entradas['body'] = strip_tags($entradas['body']);
        $entradas['user_id'] = auth()->id();

        $newPost = Post::create($entradas);
        return redirect("/post/{$newPost->id}")->with('success', 'Publicación creada');
    }

    // Función mostrar publicación
    public function showSinglePost(Post $post){
        $post->body = strip_tags(Str::markdown($post->body), '<p><img><h1><h2><h3><ul><ol><li><em><strong><br>');
        return view('single-post', ['post' => $post]);
    }
}
