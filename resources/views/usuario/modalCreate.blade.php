<!-- MODAL DE AGREGADO -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormCreate">
                    {{-- method="POST" action="{{ route('autor.store') }}" --}}
                    @csrf
                    <div class="form-group">
                      <label for="correo">Correo Electronico</label>
                      <input type="text" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                      {!! $errors->first('correo', '<small>:message</small><br>') !!}
                    </div>
                    <div class="form-group">
                      <label for="password">Contraseña</label>
                      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}">
                      {!! $errors->first('password', '<small>:message</small><br>') !!}
                  </div>
                  <div class="form-group">
                    <label for="empleado">Empleado</label>
                    <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleado_id" id="empleado">
                        <option value="">Selecciona una opcion</option>
                        @foreach ($empleado as $empleados)
                          <option value="{{ $empleados->id }}"> {{ $empleados->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('empleado_id', '<small>:message</small><br>') !!}
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
