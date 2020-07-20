<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoCurso extends Model
{
    protected $table = 'alumno_curso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'curso_id',
        'alumno_id'
    ];
    protected $guarded = [];
}
