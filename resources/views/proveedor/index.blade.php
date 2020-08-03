@extends('partials.layout')
@section('title')
Proveedores
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Proveedores</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Proveedor</a></u></h2>
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
  <div id="list-Proveedor"></div>
</div>
@include('proveedor.modalCreate')
@include('proveedor.modalEdit')
@include('proveedor.modalDelete')

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
        $('#list-Cargo').empty().html(data);
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
        listProveedor();
    });
    var listProveedor = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listProveedor') }}',
            success: function (data) {
                $('#list-Proveedor').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (proveedor) {
        var route = "{{ url('proveedor') }}/" + proveedor + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nitedit").val(data.nit);
            $("#nombreedit").val(data.nombre);
            $("#direccionedit").val(data.direccion);
            $("#telefonoedit").val(data.telefono);
            $("#correoedit").val(data.correo);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var nit = $("#nitedit").val();
        var nombre = $("#nombreedit").val();
        var direccion = $("#direccionedit").val();
        var telefono = $("#telefonoedit").val();
        var correo = $("#correoedit").val();
        var route = "{{ url('proveedor') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                nit: nit,
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
            },
            success: function (data) {
                if (data.success == "true") {
                    listProveedor();
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
        var nit = $("#nit").val();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('proveedor.store') }}";
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                nit: nit,
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
            },
            success: function (data) {
                if (data.success == "true") {
                    listProveedor();
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
    var Eliminar = function (proveedor) {
        var route = "{{ url('proveedor') }}/" + proveedor + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var proveedor = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('proveedor') }}/" + proveedor;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listProveedor();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

</script>
@endsection
