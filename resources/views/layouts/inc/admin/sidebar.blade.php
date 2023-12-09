<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @can('create admins')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admins.index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Admins</span>
                </a>
            </li>
          @endcan

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/category') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/product') }}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>

        </ul>
      </nav>
