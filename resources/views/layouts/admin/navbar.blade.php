<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        
        <span class="d-none d-md-block dropdown-toggle ps-2">
          @if(auth()->user())
            {{ auth()->user()->name }}
          @endif
        </span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        
        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>

          <form method="POST" id="logout" action="{{ route('logout') }}">
                @csrf
              </form>

          <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                        $('#logout').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>
              <form method="POST" id="logout" action="{{ route('logout') }}">
                @csrf
                  {{ __('Log Out') }}
              </form>
            </span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

