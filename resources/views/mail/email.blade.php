<h1>Tu pedido</h1><table border=1>
    <tbody>
    <tr>
    <td>Nombre</td>
    <td>Precio</td>
    <td>Cantidad</td>
    <td>Subtotal</td>
    </tr>
    @foreach (Cart::content() as $item)
    <tr>
    
    <td> {{$item->name}} </td>
    <td> {{$item->price}} </td>
    <td> {{$item->qty}} </td>
    <td> {{$item->price * $item->qty}} </td>
    
    </tr>
    @endforeach
    </tbody>
    </table>
    <div align="left">
      Total: {{Cart::total()}} €
      </div>