<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Empleado;
use App\Http\Requests\cargoRequest;
use Illuminate\Http\Request;

class cargoController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listCargo' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('cargo.index', compact('empleado'));
  }

  public function listCargo()
  {
    $cargo = Cargo::paginate(5);
    return view('cargo.listCargo', compact('cargo'));
  }

  public function create()
  {
    return view('cargo.create');
  }

  public function store(cargoRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Cargo::create($request->all());

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($cargo)
  {
    $cargoitem = Cargo::find($cargo);
    return response()->json($cargoitem);
  }

  public function update(cargoRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $cargo = Cargo::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $cargo->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $cargo = Cargo::FindOrFail($id);
    $result = $cargo->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
