<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Direccion',
        'DNI',
        'Fecha',
        'users_id'
    ];
}
