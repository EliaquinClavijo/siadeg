<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = "idimage";
    protected $fillable = [
    	'idarticulo',
    	'urlimagen',
        'thumbnail'
    ];

    public static function Buscar($id){

        return $datos = Images::find($id);
        //dd($datos);
    }
}
