<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Articulos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idProductos';
}
