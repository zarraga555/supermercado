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
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Direecion</th>
                            <th scope="col">Telefono</th>

                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse($cliente as $clientes)
                                <td>{{ $clientes->ci }}</td>
                                <td>{{ $clientes->complemento }}</td>
                                <td>{{ $clientes->nombre ." ". $clientes->apellido }}</td>
                                <td>{{ $clientes->direccion }}</td>
                                <td>{{ $clientes->telefono }}</td>
                                <td>
                                    <a href="#" onclick="Ver({{$clientes->id}})" class="btn btnT btn-info"" title="Ver" data-toggle="modal" data-target="#ShowModal"><span class="material-icons">visibility</span></a>
                                    <a href="#" onclick='Mostrar({{$clientes->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                                    {{-- @if (auth()->check() && auth()->user()->rol == "Administrador") --}}
                                        <a href="#" onclick='Eliminar({{$clientes->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                                    {{-- @endif --}}
                                </td>
                        </tr>
                            @empty
                                <td colspan="6" class="errortable" align="center">No hay datos disponibles</td>
                            @endforelse
                    </tbody>
                </table>
                {{ $cliente->links() }}
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
