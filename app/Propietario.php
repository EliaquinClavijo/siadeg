<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
   	protected $table = "propietario";
    protected $primaryKey = "idpropietario";
    protected $fillable = [
    	'nombre',
    	'dni',
    	'telefono',
    	'email',
    	'oficina',
    	'observaciones'
    ];
}
