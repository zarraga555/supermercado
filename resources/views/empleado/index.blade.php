@extends('partials.layout')
@section('title')
Empleados
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Empleados</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Empleado</a></u></h2>
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
  <div id="list-Empleado"></div>
</div>
@include('empleado.modalCreate')
@include('empleado.modalEdit')
@include('empleado.modalShow')
@include('empleado.modalDelete')

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
        $('#list-Empleado').empty().html(data);
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
        listEmpleado();
    });
    var listEmpleado = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listEmpleado') }}',
            success: function (data) {
                $('#list-Empleado').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------SHOW----------------------------
    //-----------------------------------------------------
    var Ver = function (empleado) {
        var route = "{{ url('empleado') }}/" + empleado + "/edit";
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
            $("#sexoShow").val(data.sexo);
            $("#salarioShow").val(data.salario);
            $("#cargoShow").val(data.cargo_id);
            $("#customFileLangEdit").val(data.file);


        });
    }
    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (empleado) {
        var route = "{{ url('empleado') }}/" + empleado + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#ciedit").val(data.ci);
            $("#complementoedit").val(data.complemento);
            $("#nombreedit").val(data.nombre);
            $("#apellidoedit").val(data.apellido);
            $("#telefonoedit").val(data.telefono);
            $("#correoedit").val(data.correo);
            $("#direccionedit").val(data.direccion);
            $("#sexoedit").val(data.sexo);
            $("#salarioedit").val(data.salario);
            $("#cargoedit").val(data.cargo_id);
            $("#customFileLangEdit").val(data.file);



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
        var sexo = $("#sexoedit").val();
        var salario = $("#salarioedit").val();
        var cargo = $("#cargoedit").val();
        var file = $("#customFileLangEdit").val();
        var route = "{{ url('empleado') }}/" + id + "";
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
                sexo: sexo,
                salario: salario,
                cargo_id: cargo,
                file: file,
            },
            success: function (data) {
                if (data.success == "true") {
                    listEmpleado();
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
        var ci = $("#ci").val();
        var complemento = $("#complemento").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var direccion = $("#direccion").val();
        var sexo = $("#sexo").val();
        var salario = $("#salario").val();
        var file = $("#customFileLang").val();
        var cargo = $("#cargo").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('empleado.store') }}";
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
                sexo: sexo,
                salario: salario,
                file: file,
                cargo_id: cargo,
            },
            success: function (data) {
                if (data.success == "true") {
                    listEmpleado();
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
    var Eliminar = function (empleado) {
        var route = "{{ url('empleado') }}/" + empleado + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var empleado = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('empleado') }}/" + empleado;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listEmpleado();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

</script>
@endsection
