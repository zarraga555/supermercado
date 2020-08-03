@extends('partials.layout')
@section('title')
Categorias
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Categorias</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Categoria</a></u></h2>
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
  <div id="list-Categoria"></div>
</div>

@include('categoria.modalCreate')
@include('categoria.modalEdit')
@include('categoria.modalDelete')
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
        $('#list-Categoria').empty().html(data);
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
    listCategoria();
  });
  var listCategoria = function () {
    $.ajax({
      type: 'get',
      url: '{{ url('listCategoria') }}',
      success: function (data) {
        $('#list-Categoria').empty().html(data);
      }
    });
  }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (categoria) {
        var route = "{{ url('categoria') }}/" + categoria + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nombreedit").val(data.nombre);
            $("#descripcionedit").val(data.descripcion)
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var nombre = $("#nombreedit").val();
        var descripcion = $("#descripcionedit").val();
        var route = "{{ url('categoria') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                nombre: nombre,
                descripcion: descripcion
            },
            success: function (data) {
                if (data.success == "true") {
                    listCategoria();
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
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('categorias.store') }}"
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                nombre: nombre,
                descripcion: descripcion
            },
            success: function (data) {
                if (data.success == "true") {
                    listCategoria();
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
    var Eliminar = function (categoria) {
        var route = "{{ url('categoria') }}/" + categoria + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var categoria = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('categoria') }}/" + categoria;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listCategoria();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });
</script>
@endsection
