@extends('partials.layout')
@section('title')
Productos
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Productos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                data-target="#CreateModal">Crear Nuevo Producto</a></u></h2>
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
  <div id="list-Producto"></div>
</div>
@include('producto.modalCreate')
@include('producto.modalEdit')
@include('producto.modalDelete')

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
        listProducto();
    });
    var listProducto = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listProducto') }}',
            success: function (data) {
                $('#list-Producto').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (producto) {
        var route = "{{ url('producto') }}/" + producto + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nombreedit").val(data.nombre);
            $("#descripcionedit").val(data.descripcion);
            $("#stockedit").val(data.stock);
            $("#precioedit").val(data.precio);
            $("#categoriaedit").val(data.categoria_id);
            //$("#proveedoredit").val(data.categoria_id);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var nombre = $("#nombreedit").val();
        var descripcion = $("#descripcionedit").val();
        var stock = $("#stockedit").val();
        var precio = $("#precioedit").val();
        var categoria = $("#categoriaedit").val();
        var proveedor = $("#proveedoredit").val();
        var route = "{{ url('producto') }}/" + id + "";
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
                descripcion: descripcion,
                stock: stock,
                precio: precio,
                categoria_id: categoria,
                proveedor_id: proveedor,
            },
            success: function (data) {
                if (data.success == "true") {
                    listProducto();
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
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var stock = $("#stock").val();
        var precio = $("#precio").val();
        var categoria = $("#categoria").val();
        var proveedor = $("#proveedor").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('producto.store') }}";
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                nombre: nombre,
                descripcion: descripcion,
                stock: stock,
                precio: precio,
                categoria_id: categoria,
                proveedor_id: proveedor,
            },
            success: function (data) {
                if (data.success == "true") {
                    listProducto();
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
    var Eliminar = function (producto) {
        var route = "{{ url('producto') }}/" + producto + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var producto = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('producto') }}/" + producto;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listProducto();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

</script>
@endsection
