<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Routing\Route;
use App\Images;
use App\Articulo;
use Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use DB;

class ImagesController extends Controller
{
	public function __construct()
    {      
        $this->array_articulo = Articulo::BusquedaBase()->orderBy('nombre', 'asc')->pluck('nombre','idarticulo');

    }
    public function show(Request $request,$cod)
    {
        //$imagenes = Images::OrderBy('id')->paginate(20);
        $imagenes = DB::table('images as a')
            //->select('a.codpro','a.descr','a.precio','a.porcent','a.created_at')
            ->where('a.idarticulo','=',$cod)
            ->orderBy('a.idimage','desc')
            ->paginate(20);          
        return view('Imagenes.show',['imagenes' => $imagenes]);//('datos'  => $imagenes,);
    }

    public function onlyone(Request $request,$cod)
    {
        $imagenes = DB::table('images as a')
            ->select('a.urlimagen')
            ->where('a.idarticulo','=',$cod)
            ->orderBy('a.idimage','desc')
            ->paginate(20);          
        return view('Imagenes.show_one',['imagenes' => $imagenes]);//('datos'  => $imagenes,);
    }

	public function create()
    {
        //$array_inventario     = Inventario::orderBy('descr', 'asc')->lists('descr','id');
        return view('Imagenes.crear', ['array_articulo' => $this->array_articulo]);
    }

    public function store(Request $request)
    {

        if ($request->file('urlimagen'))
        {
        $nombre = $request->file('urlimagen')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($nombre, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('urlimagen')->getClientOriginalExtension();

        echo("<script>console.log('PHP: ".$nombre."');</script>");
        
        \Storage::disk('public')->put($nombre,  \File::get($request->file('urlimagen')));
        
        $filenametostore = $filename.'_'.time().'.'.$extension;

        $request->file('urlimagen')->storeAs('public/thumbnail', $filenametostore);
        $thumbnailpath = public_path('storage/thumbnail/'.$filenametostore);
        $img = Image::make($thumbnailpath)->resize(220, 270, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

        $path_imagen = $nombre;
        $datos = new Images($request->all());
        echo("<script>console.log('PHP: ".$datos->idarticulo."');</script>");
        $d = Articulo::BuscarArticulo($datos->idarticulo);
        $datos->idarticulo = $d->idarticulo;
        $datos->urlimagen = $path_imagen;
        $datos->thumbnail = $filenametostore;
        $datos->save();
        Flash::success("Se ha registrado ".$datos->idarticulo. "de forma exitosa!");
        return Redirect::to('home');
        }else{
            echo("<script>console.log('Error');</script>");   
        }
    }


}
