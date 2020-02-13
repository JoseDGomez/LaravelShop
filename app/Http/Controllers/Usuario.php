<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categoria;

class Usuario extends Controller
{
    public function index(){
        $categoria = Categoria::all();
        
        return view("login", ['categoria' => $categoria
        ]);
    }
}
