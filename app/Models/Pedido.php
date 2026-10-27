<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    public $timestamps = false;

    protected $fillable = [
        'id_cliente',
        'id_producto',
        'cantidad',
        'total',
        'fecha',
        'estado',
    ];
}
