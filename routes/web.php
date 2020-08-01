<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('dashboard');
// });
Route::resource('/home', 'dashboardController')->names('home');
Route::resource('categoria', 'categoriasController')->names('categorias'); //LISTO
Route::get('listCategoria/{page?}', 'categoriasController@listCategoria')->name('listCategoria');//List
Route::resource('producto', 'productoController')->names('producto'); //LISTO
Route::get('listProducto/{page?}', 'productoController@listProducto')->name('listProducto');//List
Route::resource('proveedor', 'proveedorController')->names('proveedor'); //LISTO
Route::get('listProveedor/{page?}', 'proveedorController@listProveedor')->name('listProveedor');//List
Route::resource('pago', 'pagoController')->names('metodoPago');
Route::get('listPago/{page?}', 'pagoController@listPago')->name('listPago');//List
Route::resource('cliente', 'clienteController')->names('cliente'); //LISTO
Route::get('listCliente/{page?}', 'clienteController@listCliente')->name('listCliente');//List
//Route::resource('pedido', 'pedidoController')->names('pedido'); //LISTO
//route::get('listPedido/{page?}', 'pedidoController@listPedido')->name('listPedido');//List
Route::resource('cargo', 'cargoController')->names('cargo'); //LISTO
route::get('listCargo/{page?}', 'cargoController@listCargo')->name('listCargo');//List
Route::resource('empleado', 'empleadoController')->names('empleado'); //LISTO
route::get('listEmpleado/{page?}', 'empleadoController@listEmpleado')->name('listEmpleado');//List
Route::resource('usuario', 'usuarioController')->names('usuario'); //LISTO
route::get('listUsuario/{page?}', 'usuarioController@listUsuario')->name('listUsuario');//List

if(count(User::all()) >= 1){
  Auth::routes([
    'register' => false
  ]);
}else{
  Auth::routes();
}

