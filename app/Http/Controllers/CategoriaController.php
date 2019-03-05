<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;


class CategoriaController extends Controller
{
    //
    public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $categorias = Categoria::where('nombre','LIKE','%'.$query.'%')->orwhere('descr','LIKE','%'.$query.'%')->orderBy('idcategoria','asc')->paginate(10); 
            
            $data = [
                "categorias" => $categorias,
                "searchText" => $query
            ];
            
            return view('Categorias.index',$data);
        }
    }
     public function edit($id)
    {
        return view("Categorias.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    //
    public function store(Request $request)
    {
        $datos = new Categoria($request->all());
        $datos->save();
        Flash::success("Se ha registrado ".$datos->descr. " de forma exitosa!");
        return Redirect::to('newcat');
    }

    public function update(Request $request, $id)
    {
        $datos = Categoria::findOrFail($id);
        $datos->update($request->all());
        Flash::warning("Se ha actualizado ".$datos->descr." de forma exitosa!");
        return Redirect::to('homecat');
    }
}
