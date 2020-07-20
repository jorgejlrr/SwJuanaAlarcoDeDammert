<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamenLinea extends Model
{
    protected $table = 'examen_linea';
    protected $primaryKey = 'exa_id';
    public $timestamps = false;
    protected $fillable = [
        'exa_id',
        'exa_idcurso',
        'exa_titulo',
        'exa_link',
        'exa_iddocen',
        'exa_fecha'
    ];
    protected $guarded = [];
}
