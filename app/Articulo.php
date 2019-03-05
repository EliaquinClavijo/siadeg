<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
     protected $table = 'articulo';
     protected $primaryKey = "idarticulo";

    protected $fillable = [
    	'idcategoria',
        'idusuario',
        'idpropietario',
        'anio',
        'idproveedor',
        'ubicacion',
    	'codpro',
    	'nombre',
    	'descr',
    	'stock',
    	'precio',
    	'porcent',
    	'estado',
    	'created_at',
    	'update_at'
    ];

     public static function BuscarArticulo($id){

        return $datos = Articulo::find($id);
        //dd($datos);
    }

    public function scopeBusquedaBase($query){
        return $query->where('estado','=', true);
    }

    public function imagenes()
    {
        return $this->hasMany(\App\Images::class,'idarticulo','idarticulo');
    }

    public function categoria()
    {
        return $this->hasOne(\App\Categoria::class,'idcategoria','idcategoria');
    }

}
