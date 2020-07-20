<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia';
    protected $primaryKey = 'asis_id';
    public $timestamps = false;
    protected $fillable = [
        'asis_idcurso',
        'asis_idalumno',
        'asis_fecha',
        'asis_est'
    ];
    protected $guarded = [];
}
