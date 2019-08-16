<!-- Optionally, you can add icons to the links -->
<li class="active"><a href="{{url('/sistema')}}"><i class="fas fa-link"></i> <span>Inicio</span></a></li>
@if(Auth::user()->tipo->nombre == 'MOZO' || Auth::user()->tipo->nombre == 'ADMIN')
<li><a href="{{ url('/sistema/orden') }}"><i class="fas fa-link"></i> <span>Crear Pedido</span></a></li>
<li><a href="{{ url('/sistema/mesas-show') }}"><i class="fas fa-table"></i> <span>Ver Mesas</span></a></li>
@endif
@if(Auth::user()->tipo->nombre == 'ADMIN')
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
    <li><a href="{{url('/sistema/estado_mesas')}}">Estados Mesas</a></li>
    <li><a href="{{url('/sistema/estado_ordenes')}}">Estados Ordenes</a></li>
    <li><a href="{{url('/sistema/restaurant')}}">Restaurant</a></li>
    <li><a href="{{url('/sistema/zona')}}">Zonas</a></li>
    {{-- <li><a href="{{url('/sistema/menu')}}">Menu</a></li> --}}
    {{-- <li><a href="{{url('/sistema/permiso')}}">Permiso</a></li> --}}
    <li><a href="{{url('/sistema/categoria')}}">Categoria de Item</a></li>
    <li><a href="{{url('/sistema/tipodocumento')}}">Tipos de Documento</a></li>
    <li><a href="{{url('/sistema/tipoempleado')}}">Tipos de Empleados</a></li>
    <li><a href="{{url('/sistema/tipo_orden')}}">Tipo Orden</a></li>
    <li><a href="{{url('/sistema/tipo_carta')}}">Tipo Carta</a></li>
  </ul>
</li>
<li class="treeview">
  <a href="#"><i class="fas fa-hamburger"></i> <span>Empleados</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/sistema/empleados')}}">Nuevo Empleado</a></li>
  </ul>
</li>
<li class="treeview">
  <a href="#"><i class="fas fa-hamburger"></i> <span>Salon de Ventas</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/sistema/mesa')}}">Mesa</a></li>
    <li><a href="{{url('/sistema/producto')}}">Producto</a></li>
    
    <li><a href="{{url('/sistema/carta')}}">Carta</a></li>
  </ul>
</li>
<li class="treeview">
  <a href="#"><i class="fas fa-hamburger"></i> <span>Inventario</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{url('/sistema/unidad_medida')}}">Unidad de Medida</a></li>
    <li><a href="{{url('/sistema/ingredientes')}}">Ingredientes</a></li>
  </ul>
</li>
@endif