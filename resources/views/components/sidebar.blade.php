<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Dat Shine</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">Dashboard</li>
        {{-- <li class="{{ (\Request::route()->getName() == 'dang-nhap') ? 'active' : '' }}"> --}}
        <li>
          <a href="{{ route('product.index') }}">
            <i class="fa fa-dashboard"></i> <span>Category</span>
          </a>
        </li>
        {{-- </li > --}}
        {{-- <li class="{{ (\Request::route()->getName() == 'dang-nhap') ? 'active' : '' }}"> --}}
        <li>
          <a href="{{ route('product.index') }}">
            <i class="fa fa-dashboard"></i> <span>Product</span>
          </a>
        </li>
        {{-- </li> --}}
    </section>
    <!-- /.sidebar -->
  </aside>