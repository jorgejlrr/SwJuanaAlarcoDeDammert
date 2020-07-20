<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'trab_id';
    public $timestamps = false;
    protected $fillable = [
        'trab_dni',
        'trab_ape',
        'trab_nom',
        'trab_sexo',
        'trab_fnac',
        'trab_email',
        'trab_tel',
        'trab_est',
        'trab_user'
    ];
    protected $guarded = [];
}
