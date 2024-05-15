<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('home') }}" class="text-nowrap logo-img">
            <img src="../../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        @if (Auth::user()->role == 'admin')
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('harga-course.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                </span>
                <span class="hide-menu">Biaya</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" data-bs-toggle="collapse" aria-expanded="false">
                  <span>
                      <i class="ti ti-user-plus"></i>
                  </span>
                  <span class="hide-menu">Course</span>
                  <span class="menu-arrow"><i class="mdi mdi-chevron-down"></i></span>
              </a>
              <ul class="collapse collapsed">
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courses-vue.index') }}" aria-expanded="false">
                    <span>
                      <img src="../assets/images/logos/vue-js.svg" alt="Vue" width="24" height="24">
                    </span>
                    <span class="hide-menu">VUE</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courses-php.index') }}" aria-expanded="false">
                    <span>
                      <img src="../assets/images/logos/php-logo.svg" alt="Php" width="24" height="24">
                    </span>
                    <span class="hide-menu">PHP</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courses-js.index') }}" aria-expanded="false">
                    <span>
                      <img src="../assets/images/logos/javascript-logo.svg" alt="Js" width="24" height="24">
                    </span>
                    <span class="hide-menu">JAVASCRIPT</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courses-html.index') }}" aria-expanded="false">
                    <span>
                      <img src="../assets/images/logos/html-5.svg" alt="Html" width="24" height="24">
                    </span>
                    <span class="hide-menu">HTML</span>
                  </a>
                </li>

              </ul>
          </li>
        </nav>

        @elseif(Auth::user()->role == 'user')
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courses.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-user-plus"></i>
                    </span>
                    <span class="hide-menu">Course</span>
                  </a>
                </li>
        </nav>
        @endif
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>