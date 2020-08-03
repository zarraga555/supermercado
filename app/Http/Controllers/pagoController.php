<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\pagoRequest;
use App\Pago;
use Illuminate\Http\Request;

class pagoController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listPago' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('pago.index', compact('empleado'));
  }

  public function listPago()
  {
    $pago = Pago::paginate(8);
    return view('pago.listPago', compact('pago'));
  }

  public function create()
  {
    return view('pago.create');
  }

  public function store(pagoRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Pago::create($request->all());

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($pago)
  {
    $pagoitem = Pago::find($pago);
    return response()->json($pagoitem);
  }

  public function update(pagoRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $pago = Pago::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $pago->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $pago = Pago::FindOrFail($id);
    $result = $pago->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
