
    <style>
      .sidebar {
        text-align: left !important;
        background: #388E3C !important;
      }
      .nav-link span{
        font-size: 16px !important;
      }
      .sidebar-divider {
        background: #fff;
      }
    </style>
    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item mt-5 {{ request()->is('admin') ? 'active' : '' }}">
          <a class="nav-link" href="{{url('admin/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}"><i class="fa-solid fa-house"></i> <span>Site</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Orders Menu -->
        <li class="nav-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/orders/all-orders')}}"><i class="fa-solid fa-cart-shopping"></i> <span>Orders</span></a>
        </li>

        <!-- Nav Item - Newsletter Menu -->
        <li class="nav-item {{ request()->is('admin/newsletter*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/newsletter/newsletter-details')}}"><i class="fa-solid fa-envelopes-bulk"></i> <span>Newsletter</span></a>
        </li>


        <!-- Nav Item - Inbox Menu -->
        <li class="nav-item {{ request()->is('admin/inbox*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/inbox')}}"><i class="fa-solid fa-envelope"></i> <span>Indox</span></a>
        </li>

        <!-- Nav Item - BooksMenu -->
        <li class="nav-item {{ request()->is('admin/books*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/books')}}"><i class="fa-solid fa-book"></i> <span>Books</span></a>
        </li>

        <!-- Nav Item - Categories Menu -->
        <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/categories')}}"><i class="fa-regular fa-rectangle-list"></i> <span>Categories</span></a>
        </li>

        <!-- Nav Item - Authors Menu -->
        <li class="nav-item {{ request()->is('admin/authors*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/authors')}}"><i class="fa-solid fa-user-pen"></i> <span>Authors</span></a>
        </li>

        <!-- Nav Item - Publishers Menu -->
        <li class="nav-item {{ request()->is('admin/publishers*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('admin/publishers')}}"><i class="fa-solid fa-book-open-reader"></i> <span>Publishers</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->
