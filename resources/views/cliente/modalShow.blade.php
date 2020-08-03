<!-- MODAL DE AGREGADO -->
<div class="modal fade" id="ShowModal" tabindex="-1" role="dialog" aria-labelledby="ShowModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nombreTShow"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormCreate">
                    {{-- method="POST" action="{{ route('autor.store') }}" --}}
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label for="ci">Numero de CI/DNI</label>
                            <input type="number" name="cedit" id="ciShow" class="form-control @error('ci') is-invalid @enderror " value="{{ old('ci') }}" disabled>
                            {!! $errors->first('ci', '<small>:message</small><br>') !!}
                        </div>
                        <div class="form-group col">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complementoShow" placeholder="OPCIONAL" class="form-control" value="{{ old('complemento') }}" disabled>
                            {!! $errors->first('complemento', '<small>:message</small><br>') !!}
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label for="nombre">Nombres</label>
                        <input type="text" name="nombre" id="nombreShow" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" disabled>
                        {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                      </div>
                      <div class="form-group col">
                        <label for="apellido">Apellidos</label>
                        <input type="text" name="apellido" id="apellidoShow" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('apellido') }}" disabled>
                        {!! $errors->first('apellido', '<small>:message</small><br>') !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input type="number" name="telefono" id="telefonoShow" class="form-control @error('telefono') is-invalid @enderror " value="{{ old('telefono') }}" disabled>
                      {!! $errors->first('telefono', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo Electronico</label>
                      <input type="text" name="correo" id="correoShow" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" disabled>
                      {!! $errors->first('correo', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccionShow" class="form-control @error('direccion') is-invalid @enderror"  value="{{ old('direccion') }}" disabled>
                        {!! $errors->first('direccion', '<small>:message</small><br>') !!}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
{{-- FINAL DEL MODAL DE ELIMINADOD --}}
