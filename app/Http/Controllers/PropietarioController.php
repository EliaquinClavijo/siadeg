<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Propietario;
use Illuminate\Support\Facades\Redirect;

class PropietarioController extends Controller
{
    //
	public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $propietarios = Propietario::where('nombre','LIKE','%'.$query.'%')->orwhere('dni','LIKE','%'.$query.'%')->orderBy('idpropietario','asc')->paginate(10); 
            
            $data = [
                "propietarios" => $propietarios,
                "searchText" => $query
            ];
            
            return view('Propietarios.index',$data);
        }
    }
     public function edit($id)
    {
        return view("Propietarios.edit",["propietario"=>Propietario::findOrFail($id)]);
    }
    //
    public function store(Request $request)
    {
        $datos = new Propietario($request->all());
        $datos->save();
        Flash::success("Se ha registrado ".$datos->descr. " de forma exitosa!");
        return Redirect::to('newprop');
    }

    public function update(Request $request, $id)
    {
        $datos = Propietario::findOrFail($id);
        $datos->update($request->all());
        Flash::warning("Se ha actualizado ".$datos->descr." de forma exitosa!");
        return Redirect::to('homeprop');
    }
}
