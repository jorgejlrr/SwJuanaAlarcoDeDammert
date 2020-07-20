<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    protected $primaryKey = 'enc_id';
    public $timestamps = false;
    protected $fillable = [
        'enc_titulo',
        'enc_link',
        'enc_usuario',
        'enc_fecha'
    ];
    protected $guarded = [];
}
