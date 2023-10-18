<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(){
        return view('inicio');
    }
}


/*
Funcionalidad:
- Neste controller vão organizadas os layouts da pagina, neste projeto so tem um.
*/