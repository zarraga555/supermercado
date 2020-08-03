@extends('partials.layout')
@section('title')
Clientes
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Clientes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Cliente</a></u></h2>
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
  <div id="list-Cliente"></div>
</div>
@include('cliente.modalCreate')
@include('cliente.modalEdit')
@include('cliente.modalShow')
@include('cliente.modalDelete')

<script>
    //-----------------------------------------------------
  //----------------------PAGINATION---------------------
  //-----------------------------------------------------

  $(document).on("click", ".pagination li a", function(e){
    e.preventDefault();
    var route = $(this).attr("href");
    $.ajax({
      type: 'get',
      url: route,
      success: function(data){
        $('#list-Cliente').empty().html(data);
      }
    });
  });
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
        listCliente();
    });
    var listCliente = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listCliente') }}',
            success: function (data) {
                $('#list-Cliente').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------SHOW----------------------------
    //-----------------------------------------------------
    var Ver = function (cliente) {
        var route = "{{ url('cliente') }}/" + cliente + "/edit";
        $.get(route, function (data) {
            $("#idShow").val(data.id);
            $("#ciShow").val(data.ci);
            $("#complementoShow").val(data.complemento);
            $("#nombreShow").val(data.nombre);
            $("#apellidoShow").val(data.apellido);
            document.getElementById("nombreTShow").innerHTML = "Datos de: "+data.nombre + " " +data.apellido;
            $("#telefonoShow").val(data.telefono);
            $("#correoShow").val(data.correo);
            $("#direccionShow").val(data.direccion);
        });
    }
    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (cliente) {
        var route = "{{ url('cliente') }}/" + cliente + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#ciedit").val(data.ci);
            $("#complementoedit").val(data.complemento);
            $("#nombreedit").val(data.nombre);
            $("#apellidoedit").val(data.apellido);
            $("#telefonoedit").val(data.telefono);
            $("#correoedit").val(data.correo);
            $("#direccionedit").val(data.direccion);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var ci = $("#ciedit").val();
        var complemento = $("#complementoedit").val();
        var nombre = $("#nombreedit").val();
        var apellido = $("#apellidoedit").val();
        var telefono = $("#telefonoedit").val();
        var correo = $("#correoedit").val();
        var direccion = $("#direccionedit").val();
        var route = "{{ url('cliente') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                ci: ci,
                complemento: complemento,
                nombre: nombre,
                apellido: apellido,
                telefono: telefono,
                correo: correo,
                direccion: direccion,
            },
            success: function (data) {
                if (data.success == "true") {
                    listCliente();
                    // $('#CreateModal').modal('toggle');
                    $('#EditModal .close').click();
                    // alert("Agregado con exito");
                    $('#message-update').fadeIn();
                    $('#message-update').show().delay(3000).fadeOut(1);
                }
            },
            error: function (data) {
              // console.log(data.responseJSON.errors.nombre);
              $('#error').html(data.responseJSON.errors.nombre);
              $('#message-error').fadeIn();
              $('#message-error').show().delay(9000).fadeOut(1);
            }
        });
    });

    //-----------------------------------------------------
    //-----------------------STORE-------------------------
    //-----------------------------------------------------

    $('#enviar').click(function () {
        var ci = $("#ci").val();
        var complemento = $("#complemento").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var direccion = $("#direccion").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('cliente.store') }}";
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                ci: ci,
                complemento: complemento,
                nombre: nombre,
                apellido:apellido,
                telefono: telefono,
                correo: correo,
                direccion: direccion,
            },
            success: function (data) {
                if (data.success == "true") {
                    listCliente();
                    limpiarFormulario();
                    $('#CreateModal .close').click();
                    $('#message-store').fadeIn();
                    $('#message-store').show().delay(3000).fadeOut(1);
                }
            },
            error: function (data) {
              // console.log(data.responseJSON.errors.nombre);
              $('#error').html(data.responseJSON.errors.nombre);
              $('#message-error').fadeIn();
              $('#message-error').show().delay(9000).fadeOut(1);
            }
        });
    });

    //-----------------------------------------------------
    //---------------------ELIMINAR------------------------
    //-----------------------------------------------------
    var Eliminar = function (cliente) {
        var route = "{{ url('cliente') }}/" + cliente + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var cliente = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('cliente') }}/" + cliente;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listCliente();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

</script>
@endsection
