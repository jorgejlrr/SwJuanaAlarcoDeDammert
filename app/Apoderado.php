<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table = 'apoderado';
    protected $primaryKey = 'apod_id';
    public $timestamps = false;
    protected $fillable = [
        'apod_dni',
        'apod_ape',
        'apod_nom',
        'apod_sexo',
        'apod_email',
        'apod_tel'
    ];
    protected $guarded = [];
}
