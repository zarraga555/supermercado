<!-- MODAL DE AGREGADO -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
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
                      <label for="nit">Numero de NIT</label>
                      <input type="number" name="cedit" id="nitedit" class="form-control @error('nit') is-invalid @enderror " value="{{ old('nit') }}">
                      {!! $errors->first('nit', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group col">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombreedit" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                      {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <input type="text" name="direccion" id="direccionedit" class="form-control @error('direccion') is-invalid @enderror"  value="{{ old('direccion') }}">
                      {!! $errors->first('direccion', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input type="number" name="telefono" id="telefonoedit" class="form-control @error('telefono') is-invalid @enderror " value="{{ old('telefono') }}">
                      {!! $errors->first('telefono', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo Electronico</label>
                      <input type="text" name="correo" id="correoedit" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                      {!! $errors->first('correo', '<small>:message</small><br>') !!}
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
