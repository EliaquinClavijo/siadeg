<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Articulo;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use DB;

class ArticuloController extends Controller
{

	public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $query1 = "codpro";
            $query1 = trim($request->get('type'));
            $query2 = trim($request->get('view'));
            if  ($query1==''){ $query1 = "codpro";}
            $query2 = "Tabla";// Values = Cuadricula, Tabla
            $query2 = trim($request->get('view'));
            if  ($query2==''){ $query2 = "Tabla";}
            if ($query2 == 'Tabla')
            {
                $articulos = Articulo::with('imagenes')->where($query1,'LIKE','%'. $query.'%')->paginate(2);
            }
            else
            {
                $articulos = Articulo::with('imagenes')->where($query1,'LIKE','%'. $query.'%')->get();
            }
            $categorias = Categoria::get();
            
            $data = [
                "articulos" => $articulos,
                "searchText" => $query,
                "categorias"=>$categorias
            ];

            if (count($articulos) == 1)
            {
                return redirect()->route('articulodetails', ['value'=>$articulos[0]->idarticulo]);      
            }
            else{
            
            if ($query2 == 'Tabla'){
            return view('Articulos.vistatabla',$data);}
            else{
            return view('Articulos.vistacuadricula',$data);}}
        }
    }
    //
    public function store(Request $request)
    {
        $datos = new Articulo($request->all());
        $datos->save();
        Flash::success("Se ha registrado ".$datos->descr. " de forma exitosa!");
        return Redirect::to('new');
    }

     public function create(){
        return Redirect::to('home');
    }

    public function update(Request $request, $id)
    {
        $datos = Articulo::findOrFail($id);
        $datos->update($request->all());
        Flash::warning("Se ha actualizado ".$datos->descr." de forma exitosa!");
        return Redirect::to('home');
    }

    public function click(Request $request)
    {
        $query = $request->input('value');
        $articulos = Articulo::with('imagenes')->where('idarticulo','LIKE','%'. $query.'%')->get();
        $categorias = Categoria::get();
        $data = [
                "articulos" => $articulos,
                "categorias"=>$categorias
            ];
        return view('Articulos.articulo',$data);
    }
    
        
}
