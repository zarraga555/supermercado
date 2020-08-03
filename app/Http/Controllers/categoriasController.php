<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Empleado;
use App\Http\Requests\categoriasRequest;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listCategoria' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('categoria.index', compact('empleado'));
  }

  public function listCategoria()
  {
    $categoria = Categorias::paginate(5);
    return view('categoria.listCategoria', compact('categoria'));
  }

  public function create()
  {
    return view('categoria.create');
  }

  public function store(categoriasRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = Categorias::create($request->all());

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($categoria)
  {
    $categoriaitem = Categorias::find($categoria);
    return response()->json($categoriaitem);
  }

  public function update(categoriasRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $categoria = Categorias::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input = $request->all();
      //voy a guardar toda la informacion
      $resuelt = $categoria->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $categoria = Categorias::FindOrFail($id);
    $result = $categoria->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
