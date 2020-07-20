<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'alum_id';
    public $timestamps = false;
    protected $fillable = [
        'alum_dni',
        'alum_ape',
        'alum_nom',
        'alum_sexo',
        'alum_fnac',
        'alum_grad',
        'alum_est',
        'alum_apod',
        'alum_user'
    ];
    protected $guarded = [];
}
