<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;

class ProveedorController extends Controller
{
    public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $proveedores = Proveedor::where('nombre','LIKE','%'.$query.'%')->orwhere('ruc','LIKE','%'.$query.'%')->orderBy('idproveedor','asc')->paginate(10); 
            
            $data = [
                "proveedores" => $proveedores,
                "searchText" => $query
            ];
            
            return view('Proveedores.index',$data);
        }
    }
     public function edit($id)
    {
        return view("Proveedores.edit",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    //
    public function store(Request $request)
    {
        $datos = new Proveedor($request->all());
        $datos->save();
        Flash::success("Se ha registrado ".$datos->descr. " de forma exitosa!");
        return Redirect::to('newprov');
    }

    public function update(Request $request, $id)
    {
        $datos = Proveedor::findOrFail($id);
        $datos->update($request->all());
        Flash::warning("Se ha actualizado ".$datos->descr." de forma exitosa!");
        return Redirect::to('homeprov');
    }
}
