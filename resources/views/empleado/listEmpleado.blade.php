<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-responsive table">
                    <thead>
                        <tr>
                            <th scope="col">CI</th>
                            <th scope="col">Compl.</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Salario Bs</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            @forelse($empleado as $empleados)
                                <td>{{ $empleados->ci }}</td>
                                <td>{{ $empleados->complemento }}</td>
                                <td>{{ $empleados->nombre ." ". $empleados->apellido }}</td>
                                <td>{{ $empleados->correo }}</td>
                                <td>
                                  @foreach ($cargo as $cargos)
                                    @if ($empleados->cargo_id == $cargos->id)
                                        {{ $cargos->nombre }}
                                    @endif
                                  @endforeach
                                </td>
                                <td>{{ $empleados->salario }}</td>
                                <td>
                                    <a href="#" onclick="Ver({{$empleados->id}})" class="btn btnT btn-info"" title="Ver" data-toggle="modal" data-target="#ShowModal"><span class="material-icons">visibility</span></a>
                                    {{-- @if (auth()->check() && auth()->user()->rol == "Administrador") --}}
                                        <a href="#" onclick='Mostrar({{$empleados->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                                        <a href="#" onclick='Eliminar({{$empleados->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                                    {{-- @endif --}}
                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="errortable" align="center">No hay datos disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $empleado->links() }}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
