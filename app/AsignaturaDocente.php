<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaDocente extends Model
{
    protected $table = 'asignatura_docente';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'trab_id',
        'asig_id'
    ];
    protected $guarded = [];
}
