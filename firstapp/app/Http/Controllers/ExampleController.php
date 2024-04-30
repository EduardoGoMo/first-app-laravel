<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function test(){
        // cargamos info de la base de datos
        $miNombre='Eduardo';
        $catsname='Obito';
        $animals=['gato','perro','hamster','perico'];

        return view('test',['name'=>$miNombre,'catsname'=>$catsname,'allanimals'=>$animals]);
    }

    public function homepage(){
        return view('homepage');
    }

    public function aboutPage(){
        return view('single-post');
    }

}

