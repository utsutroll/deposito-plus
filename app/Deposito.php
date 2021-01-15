<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    public $table = "jumper";
    
    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable = [
        'nombre', 'link',
    ];
}
