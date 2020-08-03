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
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            @forelse($usuario as $usuarios)
                                <td>
                                  @foreach ($empleado as $empleados)
                                    @if ($usuarios->empleado_id == $empleados->id)
                                      {{ $empleados->nombre ." ".$empleados->apellido}}
                                    @else
                                      {{ $usuarios->name }}
                                    @endif
                                  @endforeach
                                </td>
                                <td>{{ $usuarios->email }}</td>
                                <td>
                                  @if ($usuarios->estado == "A")
                                    Activo
                                  @else
                                    Inactivo
                                  @endif
                                </td>
                                <td>
                                    {{-- @if (auth()->check() && auth()->user()->rol == "Administrador") --}}
                                        <a href="#" onclick='Mostrar({{$usuarios->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                                        <a href="#" onclick='Eliminar({{$usuarios->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
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
                {{-- {{ $empleado->links() }} --}}
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
