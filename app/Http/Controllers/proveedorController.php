<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\proveedorRequest;
use App\Proveedor;
use Illuminate\Http\Request;

class proveedorController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listProveedor' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('proveedor.index', compact('empleado'));
  }

  public function listProveedor()
  {
    $proveedor = Proveedor::paginate(8);
    return view('proveedor.listProveedor', compact('proveedor'));
  }

  public function create()
  {
    return view('proveedor.create');
  }

  public function store(proveedorRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Proveedor::create($request->all());

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($proveedor)
  {
    $proveedoritem = Proveedor::find($proveedor);
    return response()->json($proveedoritem);
  }

  public function update(proveedorRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $proveedor = Proveedor::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $proveedor->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $proveedor = Proveedor::FindOrFail($id);
    $result = $proveedor->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
