<!-- Brand Logo -->
<label class="brand-link">
  <img src="/img/logoSupermercado.png" alt="supermercado" class="brand-image img-circle elevation-3"
    style="opacity: .8">
  <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</label>

<!-- Sidebar -->
<div class="sidebar contenedor">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      @foreach ($empleado as $empleados)
        @if ($empleados->id == Auth()->user()->empleado_id)
          <a href="#" class="d-block">{{ $empleados->nombre." ".$empleados->apellido }}</a>
        @endif
      @endforeach
      @if (Auth()->user()->empleado_id == NULL)
        <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
      @endif
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview menu-open">
        <a href="{{ route('home.index') }}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-header">OPERACIONES</li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-cash-register"></i>
          <p>
            Pedidos
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('cliente.index')}}" class="nav-link">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>
            Clientes
          </p>
        </a>
      </li>
      <li class="nav-header">CONFIGURACION</li>
      <li class="nav-item">
        <a href="{{ route('metodoPago.index') }}" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>
            Metodos de Pago
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('cargo.index') }}" class="nav-link">
          <i class="nav-icon fas fa-user-tag"></i>
          <p>
            Area de trabajo
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('empleado.index') }}" class="nav-link">
          <i class="nav-icon fas fa-address-card"></i>
          <p>
            Empleados
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('categorias.index') }}" class="nav-link">
          <i class="nav-icon fas fa-sitemap"></i>
          <p>Categorias</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('producto.index') }}" class="nav-link">
          <i class="nav-icon fas fa-apple-alt"></i>
          <p>Productos</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('proveedor.index') }}" class="nav-link">
          <i class="nav-icon fas fa-boxes"></i>
          <p>Proveedores</p>
        </a>
      </li>
      <li class="nav-header">Administracion</li>
      <li class="nav-item">
        <a href="{{ route('usuario.index') }}" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>Usuarios</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-unlock-alt"></i>
          <p>Permisos</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-key"></i>
          <p>Roles</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
