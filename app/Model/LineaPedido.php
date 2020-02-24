<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class LineaPedido extends Model
{
    protected $table = 'linea_pedido';
    protected $fillable = [
        'Producto_idProducto',
        'Cantidad',
        'Precio',
        'Total',
        'Pedido_idPedido'
    ];
}
