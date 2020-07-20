<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'link',
        'idalumno',
        'idsecre',
        'fecha'
    ];
    protected $guarded = [];
}
