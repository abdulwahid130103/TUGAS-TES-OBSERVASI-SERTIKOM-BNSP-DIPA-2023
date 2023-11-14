<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item ">
        <a href="{{ route('arsip.index') }}" class="nav-link {{ request()->routeIs('arsip.*') ? 'active' : '' }}">
          <i class="nav-icon fa fa-archive text-light"></i>
          <p>
            <span class="brand-text text-light">Arsip</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
          <i class="nav-icon fa fa-envelope text-light"></i>
          <p>
            <span class="brand-text text-light">Kategori Surat</span>
          </p>
        </a>
      </li>
      <li class="nav-item {{ request()->is('about*') ? 'active' : '' }}">
        <a href="{{ route('about') }}" class="nav-link">
          <i class="nav-icon fas fa-th text-light"></i>
          <p>
            <span class="brand-text text-light">About</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
          <i class="nav-icon bi bi-box-arrow-left text-light" aria-hidden="true"></i>
          <p>
            <span class="brand-text text-light">Logout</span>
          </p>
        </a>
      </li>
    </ul>
  </nav>