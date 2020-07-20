<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recvideo extends Model
{
    protected $table = 'recvideo';
    protected $primaryKey = 'vid_id';
    public $timestamps = false;
    protected $fillable = [
        'vid_curso',
        'vid_titulo',
        'vid_link',
        'vid_usuario',
        'vid_fecha'
    ];
    protected $guarded = [];
}
