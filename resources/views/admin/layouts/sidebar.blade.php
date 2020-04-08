<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img class="align-content" src="{{ asset('/others') }}/{{ $shareData['admin_logo'] }}" alt="" style="width: 140px;">
          <span class="brand-text font-weight-light">CTG-SOFT</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{  asset('img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          @include('admin.layouts.menu')
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>