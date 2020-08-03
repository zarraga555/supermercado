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
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>

                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @forelse($cargo as $cargos)
                          <td>{{ $cargos->id }}</td>
                          <td>{{ $cargos->nombre }}</td>
                          <td>{{ $cargos->descripcion }}</td>
                          <td>
                            {{-- <a href="#" onclick="Ver({{$cargos->id }})" class="btn
                            btnT btn-info"" title="Ver" data-toggle="modal" data-target="#ShowModal"><span
                              class="material-icons">visibility</span></a> --}}
                            <a href="#" onclick='Mostrar({{ $cargos->id }}) ' class="btn btnT btn-success" title="Editar"
                              class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span
                                class="material-icons">create</span></a>
                            {{-- @if (auth()->check() && auth()->user()->rol == "Administrador") --}}
                            <a href="#" onclick='Eliminar({{ $cargos->id }}) ' class="btn btnT btn-danger" data-toggle="modal"
                              data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                            {{-- @endif --}}
                          </td>
                      </tr>
                    @empty
                      <td colspan="4" class="errortable" align="center">No hay datos disponibles</td>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $cargo->links() }}
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
