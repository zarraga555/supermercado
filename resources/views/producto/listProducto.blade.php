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
                            <th scope="col">Descripcion</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            @forelse($producto as $productos)
                                <td>{{ $productos->nombre }}</td>
                                <td>{{ $productos->descripcion }}</td>
                                <td>{{ $productos->stock }}</td>
                                <td>{{ $productos->precio }}</td>
                                <td>
                                  @foreach ($categoria as $categorias)
                                      @if ($productos->categoria_id == $categorias->id)
                                          {{ $categorias->nombre }}
                                      @endif
                                  @endforeach
                                </td>
                                <td>
                                    {{-- @if (auth()->check() && auth()->user()->rol == "Administrador") --}}
                                        <a href="#" onclick='Mostrar({{$productos->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                                        <a href="#" onclick='Eliminar({{$productos->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
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
                {{ $producto->links() }}
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
