<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Articulos;
use App\Model\Categoria;

class Cliente extends Controller
{
    public function index(){
        $articulos = Articulos::where('Destacado', 1)->paginate(4);
        $categoria = Categoria::all();
        return view('inicio', [
            'articulos' => $articulos],
        ['categoria' => $categoria
        ]);
        }
    
        public function productoCategoria($id){
            $articulos = Articulos::where('Categoria_idCategoria', '=' , $id)->paginate(4);
            $categoria = Categoria::all();
            return view('categoria', [
                'articulos' => $articulos],
                ['categoria' => $categoria
                ]);
        }

        public function detallesProducto($id){
            $detalles = Articulos::where('idProductos', $id)->get();
            $categoria = Categoria::all();
            return view('producto', [
                'detalles' => $detalles,
                'categoria' => $categoria
                ]);
        }
    }