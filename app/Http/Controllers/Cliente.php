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
            require 'C:\Users\Jotad\Documents\Xampp\htdocs\LaravelShop\vendor\autoload.php';


class Cliente extends Controller
{
    public function index(Request $request){
        
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

        public function checkout(){
            $categoria = Categoria::all();
            return view('checkout', [
                'categoria' => $categoria
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
        $categoria = Categoria::all();
       
        $pedido = Pedido::where('users_id', auth()->user()->id);
        return view('userpage', [
            'categoria' => $categoria
        ],['pedido' => $pedido
        ]);
      }  

      public function bajausuario(Request $request){
        Pedido::where('users_id', $request->id)->where('Estado', 'P')->update(['Estado' => 'C']);
        User::where('id', $request->id)->delete();
        
        return redirect('/');
      }

      public function deletePedido(){
        Pedido::where('users_id', $request->id)->delete();
        return redirect('/userpage');
      }
    }