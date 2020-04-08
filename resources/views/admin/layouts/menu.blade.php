<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                RBC Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Management</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('author.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Management</p>
                  </a>
                </li>
            </ul>
            <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>                              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form> 
            </li>
          </li>
          
        </ul>
      </nav>