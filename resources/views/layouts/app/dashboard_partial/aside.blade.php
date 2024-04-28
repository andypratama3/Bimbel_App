<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link  {{ Request::routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ Request::routeIs('dashboard.datamaster.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse {{ Request::routeIs('dashboard.datamaster.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        {{-- <h2 class="side-bar-title">Bimbel</h2>
        <hr class="side-bar"> --}}
        <li class="nav-item">
          <a href="{{ route('dashboard.datamaster.pendaftar.bimbel.index') }}" class="nav-link {{ Request::routeIs('dashboard.datamaster.pendafataran.bimbel.*') ? '' : 'collapsed' }}">
            <i class="bi bi-circle"></i><span>Data Pendaftaran Bimbel</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dashboard.datamaster.siswa.bimbel.index') }}" class="nav-link {{ Request::routeIs('dashboard.datamaster.siswa.bimbel.*') ? '' : 'collapsed' }}">
            <i class="bi bi-circle"></i><span>Data Murid Bimbel</span>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{ route('dashboard.datamaster.pendaftar.guru.index') }}" class="nav-link {{ Request::routeIs('dashboard.datamaster.pendaftar.guru.*') ? '' : 'collapsed' }}">
            <i class="bi bi-circle"></i><span>Pendaftaran Guru</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dashboard.datamaster.guru.index') }}" class="nav-link {{ Request::routeIs('dashboard.datamaster.guru.*') ? '' : 'collapsed' }}">
            <i class="bi bi-circle"></i><span>Guru Bimbel</span>
          </a>
        </li>
      </ul>

    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.paket.bimbel.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.paket.bimbel.index') }}">
          <i class="bi bi-book"></i>
          <span>Paket Bimbel</span>
        </a>
      </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.grade.guru.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.grade.guru.index') }}">
            <i class="bi bi-star-fill"></i>
          <span>Grade Guru</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.user.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.user.index') }}">
            <i class="bi bi-people"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->
{{--
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="forms-elements.html">
            <i class="bi bi-circle"></i><span>Form Elements</span>
          </a>
        </li>
        <li>
          <a href="forms-layouts.html">
            <i class="bi bi-circle"></i><span>Form Layouts</span>
          </a>
        </li>
        <li>
          <a href="forms-editors.html">
            <i class="bi bi-circle"></i><span>Form Editors</span>
          </a>
        </li>
        <li>
          <a href="forms-validation.html">
            <i class="bi bi-circle"></i><span>Form Validation</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="tables-general.html">
            <i class="bi bi-circle"></i><span>General Tables</span>
          </a>
        </li>
        <li>
          <a href="tables-data.html">
            <i class="bi bi-circle"></i><span>Data Tables</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="charts-chartjs.html">
            <i class="bi bi-circle"></i><span>Chart.js</span>
          </a>
        </li>
        <li>
          <a href="charts-apexcharts.html">
            <i class="bi bi-circle"></i><span>ApexCharts</span>
          </a>
        </li>
        <li>
          <a href="charts-echarts.html">
            <i class="bi bi-circle"></i><span>ECharts</span>
          </a>
        </li>
      </ul>
    </li><!-- End Charts Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="icons-bootstrap.html">
            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
          </a>
        </li>
        <li>
          <a href="icons-remix.html">
            <i class="bi bi-circle"></i><span>Remix Icons</span>
          </a>
        </li>
        <li>
          <a href="icons-boxicons.html">
            <i class="bi bi-circle"></i><span>Boxicons</span>
          </a>
        </li>
      </ul>
    </li><!-- End Icons Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav --> --}}
{{--
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
      </a>
    </li><!-- End Blank Page Nav --> --}}

  </ul>
