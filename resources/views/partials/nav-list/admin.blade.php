<!-- Optionally, you can add icons to the links -->
{{--<li class="active"><a href="{{url('/sistema')}}"><i class="fas fa-link"></i> <span>Inicio</span></a></li>--}}
<li class="nav-header">Opciones</li>
@if(Auth::user()->tipo->nombre == 'MOZO' || Auth::user()->tipo->nombre == 'ADMIN')
<li class="nav-item"><a href="{{ url('/sistema/ordenes/agregar')}}" class="nav-link"><i class="nav-icon fas fa-plus"></i>
    <p>Crear Pedido</p></a>
</li>
<li class="nav-item"><a href="{{ url('/sistema/mesas-show')}}" class="nav-link"><i class="nav-icon fas fa-table"></i>
    <p>Ver Mesas</p></a>
</li>
@endif
@if(Auth::user()->tipo->nombre == 'ADMIN')
<li class="nav-item has-treeview">
  <a href="#" class="nav-link"><i class="nav-icon fas fa-cog"></i>
    <p>Configuracion<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><a  href="{{url('/sistema/estado_mesas')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Estados Mesas</p></a>
    </li>
    <li class="nav-item"><a  href="{{url('/sistema/mesas_layout')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Ubicación de Mesas</p></a>
    </li>
    <li class="nav-item">
      <a href="{{url('/sistema/estado_ordenes')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Estados Ordenes</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/restaurant')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Restaurant</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/zona')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Zonas</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/categoria')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Categoria de Item</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/tipodocumento')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Tipos de Documento</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/tipoempleado')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Tipos de Empleados</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/tipo_orden')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Tipo Orden</p></a>
    </li>
    <li class="nav-item"><a href="{{url('/sistema/tipo_carta')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Tipo Carta</p></a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i>
    <p>Empleados<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><a  href="{{url('/sistema/empleados')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Nuevo Empleado</p></a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link"><i class="nav-icon fas fa-book"></i>
    <p>Salon de Ventas<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><a  href="{{url('/sistema/mesa')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Mesa</p></a>
    </li>
    <li class="nav-item"><a  href="{{url('/sistema/producto')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Producto</p></a>
    </li>
    <li class="nav-item"><a  href="{{url('/sistema/carta')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Carta</p></a>
    </li>
    <li class="nav-item"><a  href="{{url('/sistema/ambiente')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Ambientes</p></a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link"><i class="nav-icon fas fa-archive"></i>
    <p>Inventario<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><a  href="{{url('/sistema/unidad_medida')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Unidad de Medida</p></a>
    </li>
    <li class="nav-item"><a  href="{{url('/sistema/ingredientes')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
        <p>Ingredientes</p></a>
    </li>
  </ul>
</li>
@endif