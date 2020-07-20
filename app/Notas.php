<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'not_id';
    public $timestamps = false;
    protected $fillable = [
        'not_idcurso',
        'not_idalumno',
        'not_n1',
        'not_n2',
        'not_n3',
        'not_promedio',
        'not_bimestre'
    ];
    protected $guarded = [];
}
