<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pedido;
use App\Model\LineaPedido;
use App\Model\Articulos;
use App\Model\Categoria;
use Cart as Cart;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
 // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            use Barryvdh\DomPDF\Facade as PDF;
            
            // Load Composer's autoloader
            require '..\vendor\autoload.php';

            
    
class Cliente extends Controller
{

    

    public function index(Request $request){
        
        $articulos = Articulos::where('Destacado', 1)->paginate(4);
        $categoria = Categoria::all();
       
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());

        return view('inicio', [
            'articulos' => $articulos],
        ['categoria' => $categoria, 'localizacion' => $localizacion
        ]);
        }
    
        public function productoCategoria($id){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');

 // 'application/json; charset=utf8'
 // '{"id": 1420053, "name": "guzzle", ...}'
            $localizacion = json_decode($response->getBody());
            $articulos = Articulos::where('Categoria_idCategoria', '=' , $id)->paginate(4);
            $categoria = Categoria::all();
            $nombre = Categoria::select('Nombre')->where('idCategoria', $id)->get();
            return view('categoria', [
                'articulos' => $articulos],
                ['categoria' => $categoria, 'localizacion' => $localizacion, 'nombre'=>$nombre
                ]);
        }

        public function detallesProducto($id){
            $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());
            $detalles = Articulos::where('idProductos', $id)->get();
            $categoria = Categoria::all();
            return view('producto', [
                'detalles' => $detalles,
                'categoria' => $categoria, 'localizacion' => $localizacion
                ]);
        }

        public function checkout(){
            $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());
            $categoria = Categoria::all();
            return view('checkout', [
                'categoria' => $categoria, 'localizacion' => $localizacion
                ]);
        }
        
      public function addPedido(Request $request){
        $pedido = Pedido::create(['Nombre' =>$request->nombre ,
            'Apellidos' => $request->apellidos ,
            'DNI' => $request->dni ,
            'Direccion' => $request->direccion ,
            'Fecha' => date('d-m-Y'),
            'users_id'=>auth()->user()->id]);


        foreach(Cart::content() as $item){

        $idPedido = $pedido->id;
        LineaPedido::create(['Cantidad'=>Cart::get($item->rowId)->qty,
        'Precio'=>Cart::get($item->rowId)->price,
        'Total'=>(Cart::get($item->rowId)->price*Cart::get($item->rowId)->qty),
        'Producto_idProducto'=>Cart::get($item->rowId)->id,
        'Pedido_idPedido'=>$idPedido
        ]);

            }
            /*$stock = Articulos::select('Stock')->where('idProducto', Cart::get($item->rowId)->id);
            Articulos::where('idProducto', Cart::get($item->rowId)->id)->update(['Stock' => $stock-Cart::get($item->rowId)->qty]);*/

            $data = [
                'titulo' => 'Pedido LaravelShop'
            ];
         
            $data = PDF::loadView('mail.email', $data)
                ->save(storage_path('app/public/pdf') . 'pedido.pdf');
            
 
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'laravelshopemail@gmail.com';                     // SMTP username
                $mail->Password   = 'gangui32';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('laravelshopemail@gmail.com', 'Shop');
                $mail->addAddress(auth()->user()->email, auth()->user()->name);     // Add a recipient   // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
            
                // Attachments
                $mail->addAttachment(storage_path('app/public/pdf') . 'pedido.pdf');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Este es tu pedido, ¡Gracias por confiar en nosotros!';
                $mail->Body    = view('mail.email') ;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }    
        
        
                    
         Cart::destroy();   
         return redirect('/');
        }

      public function userpage(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());  
        $categoria = Categoria::all();
        $pedido = Pedido::where('users_id', auth()->user()->id)->get();
        
        return view('userpage', [
            'categoria' => $categoria
        ,'pedidos' => $pedido, 'localizacion' => $localizacion
        ]);
      }  

      public function bajausuario(Request $request){
        Pedido::where('users_id', $request->id)->where('Estado', 'P')->update(['Estado' => 'C']);
        User::where('id', $request->id)->delete();
        
        return redirect('/');
      }

      public function deletePedido($id){
        Pedido::where('idPedido', $id)->update(['Estado' => 'C']);
        return redirect('/userpage');
      }

      public function cambiomodificacion(){
        $categoria = Categoria::all();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
    
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());  
          
          return view('modificarusuario', [
            
        'categoria' => $categoria, 'localizacion' => $localizacion
        ]);
      }

      public function detallePedido($id){
        $idPedido = $id;  
        $categoria = Categoria::all();
        $productos = LineaPedido::where('Pedido_idPedido', $id)->get()->toArray();
        $i=-1;
        $total = 0;

        foreach($productos as $producto){
            $i++;
            $datosProducto = Articulos::where("idProductos", $producto["Producto_idProducto"])->first();
            $productos[$i]["Nombre"] = $datosProducto->Nombre;
            $total += $producto["Precio"]*$producto["Cantidad"];
        }

        $productos['totaltodo']=$total;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city');
       
     // 'application/json; charset=utf8'
     // '{"id": 1420053, "name": "guzzle", ...}'
        $localizacion = json_decode($response->getBody());  
        
          return view('detallespedido', [
            
            'productos' => $productos, 'categoria' => $categoria, 'localizacion' => $localizacion, 'idPedido' => $id
        ]);
      }

      public function downloadPDF($id)
      {
          
        
        $productos = LineaPedido::where('Pedido_idPedido', $id)->get()->toArray();
        $i=-1;
        $total = 0;

        foreach($productos as $producto){
            $i++;
            $datosProducto = Articulos::where("idProductos", $producto["Producto_idProducto"])->first();
            $productos[$i]["Nombre"] = $datosProducto->Nombre;
            $total += $producto["Precio"]*$producto["Cantidad"];
        }

        $productos['totaltodo']=$total;
          //print_r($productos);
          $pdf= PDF::loadView('factura', array("productos"=>$productos))->save(storage_path('app/public/') . 'factura.pdf');
          return $pdf->download('factura.pdf');
      
         
      
      
      
     
      }  
}
    