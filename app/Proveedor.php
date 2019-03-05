<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = "proveedor";
    protected $primaryKey = "idproveedor";
    protected $fillable = [
    	'nombre',
    	'ruc',
    	'telefono',
    	'email',
    	'observaciones'
    ];
}
	