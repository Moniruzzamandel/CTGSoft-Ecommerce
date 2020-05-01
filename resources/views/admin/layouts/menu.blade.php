<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      @permission(['All Permission','Permission Management','Role Management','User Management'])     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                RBC Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
            @permission(['All Permission','Permission Management'])   
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link {{ (request()->is('admin/permission*')) ? 'active' : '' }}">
                  <i class="far fa-folder-open"></i>
                  <p>Permission Management</p>
                </a>
              </li>
            @endpermission
            @permission(['All Permission','Role Management'])   
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('admin/role*')) ? 'active' : '' }}"">
                    <i class="fas fa-user-tag"></i>
                  <p>Role Management</p>
                </a>
              </li>
            @endpermission
            @permission(['All Permission','User Management'])   
              <li class="nav-item">
                  <a href="{{ route('author.index') }}" class="nav-link {{ (request()->is('admin/author*')) ? 'active' : '' }}"">
                      <i class="fas fa-users"></i>
                    <p>User Management</p>
                  </a>
                </li>
            @endpermission    
            </ul>
          </li>
      @endpermission
      @permission(['Category Management','Products Management','All Permission'])
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Ecommerce Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              @permission(['Category Management','All Permission'])  
                <li class="nav-item">
                  <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="fab fa-audible"></i>
                    <p>Category Management</p>
                  </a>
                </li>
              @endpermission
              @permission(['Products Management','All Permission'])  
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                      <i class="fas fa-box"></i>
                      <p>Products Management</p>
                    </a>
                  </li>
              @endpermission    
              </ul>
            </li>
      @endpermission
      @permission(['Settings Management','All Permission'])    
          <li class="nav-item">
              <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Settings</p>
              </a>
            </li>
      @endpermission      
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
          
        </ul>
      </nav>