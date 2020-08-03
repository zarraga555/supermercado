<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title', 'Supermercado')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/fontawesome/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        /* .row2{
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: -85px;
        }
        a {
            text-decoration: none;
        }*/
        .btnT{
                height: 38px;
            }
        .btnTable {
            padding: 2.5px 2.5px;
        }

        .container p:not(:last-child) {
            margin-bottom: 1rem;
        }
        .col-sm-6{
          margin-bottom: 1rem;
        }


        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (min-width: 769px) {
            .navbar{
            height: 80px;
            }
            .btn-block {
                display: inline-block;
                width: auto;
                margin-top: 0rem;
            }
            .btn-block+.btn-block {
                margin-top: 0rem;
            }
            .divTable{
                position: relative;
                margin: auto;
            }

            table{
                position: relative;
                margin: auto;
                width: 100%;
                display: inline-table;
            }
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                display: inline-table;
            }


}
.sidebar{
  padding-bottom: 57px
}

/* Estilos para motores Webkit y blink (Chrome, Safari, Opera... )*/

.contenedor::-webkit-scrollbar {
    -webkit-appearance: none;
}

.contenedor::-webkit-scrollbar:vertical {
    width:10px;
}

.contenedor::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
    display: none;
}

.contenedor::-webkit-scrollbar:horizontal {
    height: 5px;
}

.contenedor::-webkit-scrollbar-thumb {
    background-color: #797979;
    border-radius: 20px;
    /* border: 2px solid #f1f2f3; */
}

.contenedor::-webkit-scrollbar-track {
    border-radius: 10px;
}
        } */
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <div>
      @include('partials.nav')
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      @include('partials.sidebar')
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer">
      <strong> {{ config('app.name') }} | Copyright &copy; {{ date('Y') }} </strong>
    </footer>
  </div>
    <!-- jQuery -->
    <script src="/js/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.js"></script>
</body>

</html>
