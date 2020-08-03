<!-- MODAL DE AGREGADO -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormCreate">
                    {{-- method="POST" action="{{ route('autor.store') }}" --}}
                    @csrf
                    <input type="hidden" id="idedit" name="id" value="{{ old('id') }}">
                    <div class="form-group">
                      <label for="nombre">Nombre Producto</label>
                      <input type="text" name="nombre" id="nombreedit" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                      {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea class="form-control" name="descripcion" id="descripcionedit" rows="2">{{ old('descripcion') }}</textarea>
                      {!! $errors->first('descripcion', '<small>:message</small><br>') !!}
                  </div>
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" name="stock" id="stockedit" class="form-control @error('stock') is-invalid @enderror " value="{{ old('stock') }}">
                      {!! $errors->first('stock', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input type="text" name="precio" id="precioedit" placeholder="0.00" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}">
                      {!! $errors->first('precio', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="categoria">Categoria</label>
                      <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categoriaedit">
                          <option value="">Selecciona una opcion</option>
                          @foreach ($categoria as $categorias)
                            <option value="{{ $categorias->id }}"> {{ $categorias->nombre }}</option>
                          @endforeach
                      </select>
                      {!! $errors->first('categoria_id', '<small>:message</small><br>') !!}
                  </div>
                  <div class="form-group">
                      <label for="proveedor">Proveedor</label>
                      <select class="form-control @error('proveedor_id') is-invalid @enderror" name="proveedor_id" id="proveedoredit">
                          <option value="">Selecciona una opcion</option>
                          @foreach ($proveedor as $proveedores)
                            <option value="{{ $proveedores->id }}"> {{ $proveedores->nombre }}</option>
                          @endforeach
                      </select>
                      {!! $errors->first('proveedor_id', '<small>:message</small><br>') !!}
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="actualizar" class="btn btn-primary" >Guardar</button>
            </div>
        </div>
    </div>
</div>
{{-- FINAL DEL MODAL DE ELIMINADOD --}}
