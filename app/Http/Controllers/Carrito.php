<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Articulos;
use App\Model\Categoria;
use Cart as Cart;


class Carrito extends Controller
{
    public function index(){
        //var_dump(Cart::content());
        $categoria = Categoria::all();
        
        return view("carrito", ['categoria' => $categoria
        ]);
    }

    public function addProductoInicio(Request $request){
        
        $producto = Articulos::find($request->id);

        Cart::add($producto->idProductos, $producto->Nombre, 1, (round($producto->Precio_Venta-(($producto->Precio_Venta*$producto->Descuento)/100),2)));
        return redirect('/');
        
       
    }

    public function addProducto(Request $request){
        
        $producto = Articulos::find($request->id);

        Cart::add($producto->idProductos, $producto->Nombre, $request->cantidad, (round($producto->Precio_Venta-(($producto->Precio_Venta*$producto->Descuento)/100),2)));
        return redirect('/');
    }

    public function update(Request $request){

        Cart::update($request->id, $request->qty);
        return redirect('/carrito')->withSuccessMessage('Producto actualizado');;
    }

    public function delete(Request $request){
        Cart::remove($request->id);
        return redirect('/carrito')->withSuccessMessage("Producto eliminado");
    }

    public function destroy(){
        Cart:destroy();
    }
}