<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Empleado;
use App\Http\Requests\empleadoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class empleadoController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listEmpleado' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }

  public function index()

  {
    $cargo = Cargo::all();
    $empleado = Empleado::all();
    return view('empleado.index', compact('cargo', 'empleado'));
  }

  public function listEmpleado()
  {
    $cargo = Cargo::all();
    $empleado = Empleado::paginate(5);
    return view('empleado.listEmpleado', compact('empleado', 'cargo'));
  }

  public function create()
  {
    return view('empleado.create');
  }

  public function store(empleadoRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Empleado::create($request->all());

      if($request->hasFile('file')){
        $patch = Storage::disk('public')->put('image', $request->file('file'));
        $result->fill(['file' => asset($patch)])->save();
      }

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($empleado)
  {
    $empleadoitem = Empleado::find($empleado);
    return response()->json($empleadoitem);
  }

  public function update(empleadoRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $empleado = Empleado::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $empleado->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $empleado = Empleado::FindOrFail($id);
    $result = $empleado->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
