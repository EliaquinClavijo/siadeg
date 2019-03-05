<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('articulo','ArticuloController');

Route::resource('categoria','CategoriaController');

Route::resource('imagenes', 'ImagesController');

Route::resource('proveedor', 'ProveedorController');

Route::resource('propietario', 'PropietarioController');


/* Articulos*/
Route::get('/home', 'ArticuloController@index');
Route::get('/articulodetails', 'ArticuloController@click')->name('articulodetails');
Route::get('/new', 'ArticuloController@create');


/* Categorias*/
Route::get('/homecat', 'CategoriaController@index');
Route::get('/newcat', function () {
    return view('Categorias.crear');
});
Route::get('/editarcat', function () {
    return view('Categorias.edit');
});

/* Proveedores*/

Route::get('/homeprov', 'ProveedorController@index');
Route::get('/newprov', function () {
    return view('Proveedores.crear');
});
Route::get('/editarprov', function () {
    return view('Proveedores.edit');
});

/* Propietarios*/

Route::get('/homeprop', 'PropietarioController@index');
Route::get('/newprop', function () {
    return view('Propietarios.crear');
});
Route::get('/editarprop', function () {
    return view('Propietarios.edit');
});


/* Prueba Imagenes*/
Route::get('/newimage', 'ImagesController@create');
Route::get('/listimages/{cod}', 'ImagesController@onlyone');
Route::get('/showimage/{cod}','ImagesController@show');






/* Reportes */
Route::get('/reporteProductos','ReporteController@Reporte1');
Route::get('/reportesview','ReporteController@viewpdf');
