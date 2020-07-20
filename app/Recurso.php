<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recurso';
    protected $primaryKey = 'rec_id';
    public $timestamps = false;
    protected $fillable = [
        'rec_curso',
        'rec_bimestre',
        'rec_archivo',
        'rec_dni',
        'rec_rol',
        'rec_fechahora'
    ];
    protected $guarded = [];
}
