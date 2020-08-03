<!-- MODAL DE EDITADO-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Metodo de Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    @csrf
                    <input type="hidden" id="idedit" name="id" value="{{ old('id') }}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombreedit" name="nombre" class="form-control @error('nombre') is-invalid @enderror "
                            value="{{ old('nombre') }}">
                        {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea class="form-control" id="descripcionedit" name="descripcion"  rows="3" >{{ old('descripcionedit') }}</textarea>
                      {!! $errors->first('descripcionedit', '<small>:message</small><br>') !!}
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="actualizar" class="btn btn-primary" >Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
{{-- FINAL DEL MODAL DE EDITADO --}}
