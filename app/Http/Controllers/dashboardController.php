<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only('index' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
  }
  public function index()
  {
    $empleado = Empleado::all();
    return view('dashboard', compact('empleado'));
  }

}
