<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Empleado;
use App\Http\Requests\productoRequest;
use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class productoController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listProducto' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $categoria = Categorias::all();
    $proveedor = Proveedor::all();
    $empleado = Empleado::all();
    return view('producto.index', compact('categoria', 'proveedor', 'empleado'));
  }

  public function listProducto()
  {
    $categoria = Categorias::all();
    $proveedor = Proveedor::all();
    $producto = Producto::paginate(8);
    return view('producto.listProducto', compact('categoria', 'proveedor', 'producto'));
  }

  public function create()
  {
    return view('producto.create');
  }

  public function store(productoRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Producto::create($request->all());
      if($request->get('proveedor_id')){
        $result->proveedor()->sync($request->get('proveedor_id'));
      }
      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($producto)
  {
    $productoitem = Producto::find($producto);
    return response()->json($productoitem);
  }

  public function update(productoRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $producto = Producto::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $producto->fill($input)->save();

      if($request->get('proveedor_id')){
        $producto->proveedor()->sync($request->get('proveedor_id'));
      }
      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $producto = Producto::FindOrFail($id);
    $result = $producto->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
