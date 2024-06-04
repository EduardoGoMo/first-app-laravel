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

    // Función borrar una publicación
    public function deletePost(Post $post){
        $post->delete();
        return redirect('/profile/'. auth()->user()->username)->with('success', 'Publicación eliminada');
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

    // Función mostrar formulario de edición
    public function showEditForm(Post $post){
        return view('edit-post', ['post' => $post]);
    }

    // Función actualizar publicación
    public function updatePost(Request $request, Post $post){
        $entradas = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = strip_tags($entradas['title']);
        $post->body = strip_tags($entradas['body']);
        $post->update($entradas);
        return redirect("/post/{$post->id}")->with('success', 'Publicación actualizada');
    }

    // Función mostrar publicación
    public function showSinglePost(Post $post){
        $post->body = strip_tags(Str::markdown($post->body), '<p><img><h1><h2><h3><ul><ol><li><em><strong><br>');
        return view('single-post', ['post' => $post]);
    }
}
