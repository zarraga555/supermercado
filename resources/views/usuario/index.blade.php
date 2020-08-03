@extends('partials.layout')
@section('title')
Usuarios
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Usuarios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Usuario</a></u></h2>
        </ol>
      </div>
    </div>
      <!--MESSAGES-->
      <div>
        <div id="message-store" class="alert alert-success alert-dismissible" role="alert" style="display:none">
          <strong>Se ha agregado correctamente</strong>
        </div>
        <div id="message-update" class="alert alert-success alert-dismissible" role="alert" style="display:none">
          <strong>Se ha actualizado correctamente</strong>
        </div>
        <div id="message-destroy" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
          <strong>Se ha borrado correctamente</strong>
        </div>
      </div>
  </div><!-- /.container-fluid -->
</section>
<div class="panel-body">
  <div id="list-Usuario"></div>
</div>
@include('usuario.modalCreate')
@include('usuario.modalEdit')
@include('usuario.modalDelete')

<script>
    //-----------------------------------------------------
    //-----------------LIMPIADO DE LOS INPUTS--------------
    //-----------------------------------------------------

    function limpiarFormulario() {
        document.getElementById("FormCreate").reset();
    }

    //-----------------------------------------------------
    //-------------MOSTRAR DATOS EN UNA TABLA--------------
    //-----------------------------------------------------

    $(document).ready(function () {
        listUsuario();
    });
    var listUsuario = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listUsuario') }}',
            success: function (data) {
                $('#list-Usuario').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (usuario) {
        var route = "{{ url('usuario') }}/" + usuario + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nombre").val(data.name);
            $("#correoedit").val(data.email);
            $("#empleadoedit").val(data.empleado_id);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var correo = $("#correoedit").val();
        var password = $('#passwordedit').val();
        var empleado = $("#empleadoedit").val();
        var route = "{{ url('usuario') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                id: id,
                email: correo,
                password: password,
                empleado_id: empleado,
            },
            success: function (data) {
                if (data.success == "true") {
                    listUsuario();
                    // $('#CreateModal').modal('toggle');
                    $('#EditModal .close').click();
                    // alert("Agregado con exito");
                    $('#message-update').fadeIn();
                    $('#message-update').show().delay(3000).fadeOut(1);
                }
            },
            error: function (data) {
                alert('campos vacios');
            }
        });
    });

    //-----------------------------------------------------
    //-----------------------STORE-------------------------
    //-----------------------------------------------------

    $('#enviar').click(function () {
        var correo = $("#correo").val();
        var password = $("#password").val();
        var empleado = $("#empleado").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('usuario.store') }}";
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                email: correo,
                password: password,
                empleado_id: empleado,
            },
            success: function (data) {
                if (data.success == "true") {
                    listUsuario();
                    limpiarFormulario();
                    $('#CreateModal .close').click();
                    $('#message-store').fadeIn();
                    $('#message-store').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

    //-----------------------------------------------------
    //---------------------ELIMINAR------------------------
    //-----------------------------------------------------
    var Eliminar = function (usuario) {
        var route = "{{ url('usuario') }}/" + usuario + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var usuario = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('usuario') }}/" + usuario;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listUsuario();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

</script>
@endsection
