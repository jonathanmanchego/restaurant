  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <img src="/img/avatar2.png" class="img-circle" alt="{{ Auth::user()->nombre}}">
      <p>
        {{ Auth::user()->nombre . ' ' .Auth::user()->apellido }}
      </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="#">Tareas</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Horario</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Reuniones</a>
        </div>
      </div>
      <!-- /.row -->
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a class="btn btn-default btn-flat" href="#"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Salir') }}
        </a>

        <form id="logout-form" action="{{ route('sistema::sis-logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </li>
  </ul>