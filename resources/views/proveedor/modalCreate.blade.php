<!-- MODAL DE AGREGADO -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormCreate">
                    {{-- method="POST" action="{{ route('autor.store') }}" --}}
                    @csrf
                    <div class="form-group">
                        <label for="nit">Numero de NIT</label>
                        <input type="number" name="nit" id="nit" class="form-control @error('nit') is-invalid @enderror " value="{{ old('nit') }}">
                        {!! $errors->first('nit', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombres</label>
                      <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                      {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror"  value="{{ old('direccion') }}">
                      {!! $errors->first('direccion', '<small>:message</small><br>') !!}
                  </div>
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input type="number" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror " value="{{ old('telefono') }}">
                      {!! $errors->first('telefono', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo Electronico</label>
                      <input type="text" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                      {!! $errors->first('correo', '<small>:message</small><br>') !!}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="enviar" class="btn btn-primary" >Guardar</button>
            </div>
        </div>
    </div>
</div>
{{-- FINAL DEL MODAL DE ELIMINADOD --}}
