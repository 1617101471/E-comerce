<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset ('assets/img/admin.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Table</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('produk.index')}}"><i class="fa fa-circle-o"></i>Produk</a></li>
            <li class="active"><a href="{{ route('artikel.index')}}"><i class="fa fa-circle-o"></i>Artikel</a></li>
            <li class="active"><a href="{{ route('testimoni.index')}}"><i class="fa fa-circle-o"></i>Testimoni</a></li>
            <li class="active"><a href="{{ route('galeri.index')}}"><i class="fa fa-circle-o"></i>Galeri</a></li>
            <li class="active"><a href="{{ route('user.index')}}"><i class="fa fa-circle-o"></i>User</a></li>
            <li class="active"><a href="{{ route('kontak.index')}}"><i class="fa fa-circle-o"></i>Kontak</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>