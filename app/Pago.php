<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'año',
        'idalumno',
        'montoanual',
        'descuento',
        'inicial',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'setiembre',
        'octubre',
        'noviembre',
        'diciembre'
    ];
    protected $guarded = [];
}
