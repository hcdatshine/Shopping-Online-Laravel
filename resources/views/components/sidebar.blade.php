<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">Dashboard</li>
        {{-- <li class="{{ (\Request::route()->getName() == 'dang-nhap') ? 'active' : '' }}"> --}}
        <li class="{{ (\Request::route()->getName() == 'category.index') ? 'active' : '' }}">
          <a href="{{ route('category.index') }}">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Category</span>
          </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'product.index') ? 'active' : '' }}">
          <a href="{{ route('product.index') }}">
            <i class="fa fa-align-left"></i> <span>Product</span>
          </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'user.index') ? 'active' : '' }}">
          <a href="{{ route('user.index') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>User</span>
          </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'user.flashsale') ? 'active' : '' }}">
          <a href="{{ route('flashsale.index') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Flash Sale</span>
          </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'productflashsale.index') ? 'active' : '' }}">
          <a href="{{ route('productflashsale.index') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Product Flash Sale</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>