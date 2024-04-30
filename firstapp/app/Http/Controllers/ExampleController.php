<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homePage(){
        // cargamos info de la base de datos
        $miNombre='Eduardo';
        $catsname='Obito';
        $animals=['gato','perro','hamster','perico'];

        return view('homepage',['name'=>$miNombre,'catsname'=>$catsname,'allanimals'=>$animals]);
    }

    public function aboutPage(){
        return '<h1>About Page</h1><a href="/">Back to home<a>';
    }

}

