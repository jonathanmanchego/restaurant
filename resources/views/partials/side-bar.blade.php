<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="float-left image">
          <img src="/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="float-left info">
          <p>{{ Auth::user()->nombre . ' ' .Auth::user()->apellido }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> {{Auth::user()->tipo->nombre}}</a>
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
        @include('partials.nav-list.admin')
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>