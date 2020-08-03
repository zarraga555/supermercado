<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Empleado;
use App\Http\Requests\clienteRequest;
use Illuminate\Http\Request;

class clienteController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listCliente' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('cliente.index', compact('empleado'));
  }

  public function listCliente()
  {
    $cliente = Cliente::paginate(5);
    return view('cliente.listCliente', compact('cliente'));
  }

  public function create()
  {
    return view('cliente.create');
  }

  public function store(clienteRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Cliente::create($request->all());

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($empleado)
  {
    $clienteitem = Cliente::find($empleado);
    return response()->json($clienteitem);
  }

  public function update(clienteRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $cliente = Cliente::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $cliente->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $cliente = Cliente::FindOrFail($id);
    $result = $cliente->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
