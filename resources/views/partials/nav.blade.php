<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('home.index' )}}" class="nav-link">Inicio</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contacto</a>
    </li>
  </ul>

  {{-- <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> --}}
  @auth
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <li class=" nav-item dropdown">
        <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Session</a>
    </li>
      </a>
    </li>
  </ul>
  @endauth
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
