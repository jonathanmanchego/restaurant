<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Robinson Manchego</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Restaurant</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{url('/sistema')}}"><i class="fas fa-link"></i> <span>Inicio</span></a></li>
        <li><a href="#"><i class="fas fa-link"></i> <span>Carta</span></a></li>
        <li class="header">
          Configuraciones Admin
        </li>
        <li class="treeview">
          <a href="#"><i class="fas fa-link"></i> <span>Configuraciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/sistema/zona')}}">Zonas</a></li>
            <li><a href="{{url('/sistema/tipodocumento')}}">Tipos de Documento</a></li>
            <li><a href="{{url('/sistema/tipousuario')}}">Tipos de Usuario</a></li>
            <li><a href="{{url('/sistema/restaurant')}}">Restaurant</a></li>
            <li><a href="{{url('/sistema/menu')}}">Menu</a></li>
            <li><a href="{{url('/sistema/permiso')}}">Permiso</a></li>
            <li><a href="{{url('/sistema/estado_mesas')}}">Estados Mesas</a></li>
            <li class="treeview">
              <a href="#"><i class="fas fa-hamburger"></i> <span>Patio de Ventas</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/sistema/mesa')}}">Mesa</a></li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>