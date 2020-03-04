<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Articulos;
use App\Model\Categoria;
use Cart as Cart;


class Carrito extends Controller
{

             /**
 * @brief CARGA DE LA VISTA DEL CARRITO
 * 
 */

    public function index(){
        //var_dump(Cart::content());
        $categoria = Categoria::all();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());
        return view("carrito", ['categoria' => $categoria, 'localizacion' => $localizacion
        ]);
        
    }
         /**
 * @brief AÑADIR UN PRODUCTO AL CARRITO
 * @param $request -> DATOS REQUERIDOS PARA AÑADIR AL CARRITO (NOMBRE, PRECIO, CANTIDAD)
 */

    public function addProducto(Request $request){
        
        $producto = Articulos::find($request->id);

        Cart::add($producto->idProductos, $producto->Nombre, $request->cantidad, (round($producto->Precio_Venta-(($producto->Precio_Venta*$producto->Descuento)/100),2)));
        return redirect('/');
    }
         /**
 * @brief CAMBIAR LA CANTIDAD DE UN PRODUCTO EN EL CARRITO
 * @param $request -> CANTIDAD
 */
    public function update(Request $request){

        Cart::update($request->id, $request->qty);
        return redirect('/carrito')->withSuccessMessage('Producto actualizado');;
    }
         /**
 * @brief ELIMINAR PRODUCTO DEL CARRITO
 * @param $request -> ID DEL PRODUCTO QUE SE VA A ELIMINAR
 */
    public function delete(Request $request){
        Cart::remove($request->id);
        return redirect('/carrito')->withSuccessMessage("Producto eliminado");
    }

  
}