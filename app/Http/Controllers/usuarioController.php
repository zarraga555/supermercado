<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\usuarioRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index','listUsuario' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }

  public function index()
  {
    $empleado = Empleado::all();
    return view('usuario.index', compact('empleado'));
  }

  public function listUsuario()
  {
    $usuario = User::paginate(8);
    $empleado = Empleado::all();
    return view('usuario.listUsuario', compact('usuario', 'empleado'));
  }

  public function create()
  {
    return view('usario.create');
  }

  public function store(usuarioRequest $request)
  {

    if ($request->ajax()) {
      //buscara el id que le mandamos
      $result = User::create([
        'email' => request('email'),
        'password' => Hash::make(request('password')),
        'empleado_id' => request('empleado_id'),
      ]);

      if ($result) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function edit($usuario)
  {
    $usuarioitem = User::find($usuario);
    return response()->json($usuarioitem);
  }

  public function update(usuarioRequest $request, $id)
  {
    if ($request->ajax()) {
      //buscara el id que le mandamos
      $usuario = User::FindOrFail($id);
      //guardo toda la informacion que me esta mandando
      $input=([
        'email' => request('email'),
        'password' => Hash::make(request('password')),
        'empleado_id' => request('empleado_id'),
      ]);
      //voy a guardar toda la informacion
      $resuelt = $usuario->fill($input)->save();

      if ($resuelt) {
        return response()->json(['success' => 'true']);
      } else {
        return response()->json(['success' => 'false']);
      }
    }
  }

  public function destroy($id)
  {
    $usuario = User::FindOrFail($id);
    $result = $usuario->delete();
    if ($result) {
      return response()->json(['success' => 'true']);
    } else {
      return response()->json(['success' => 'false']);
    }
  }
}
