<nav id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if (auth()->user()->isAdmin() or auth()->user()->isOperator())
        <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('dashboard.*') ? 'active' : 'collapsed' }}"  aria-current="page" href="{{ route('dashboard.index') }}">
            <i class="bi bi-house-door-fill"></i>
            <span class="align-text-bottom"></span>
            Dashboard
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('positions.*') ? 'active' : 'collapsed' }}" href="{{ route('positions.index') }}">
            <i class="bi bi-tag-fill"></i>
            <span class="align-text-bottom"></span>
            Jabatan
            </a>
        </li><!-- End Jabatan Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : 'collapsed' }}"  href="{{ route('employees.index') }}">
            <i class="bi bi-people-fill"></i>
            <span class="align-text-bottom"></span>
            Data Karyawan
            </a>
        </li><!-- End Jabatan Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('holidays.*') ? 'active' : 'collapsed' }}"  href="{{ route('holidays.index') }}">
            <i class="bi bi-calendar2-fill"></i>
            <span class="align-text-bottom"></span>
            Hari Libur
            </a>
        </li><!-- End Jabatan Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('attendances.*') ? 'active' : 'collapsed' }}"  href="{{ route('attendances.index') }}">
            <i class="bi bi-clipboard-fill"></i>
            <span>Absensi</span>
            </a>
        </li><!-- End Jabatan Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('presences.*') ? 'active' : 'collapsed' }}"
                href="{{ route('presences.index') }}">
            <i class="bi bi-clipboard-check-fill"></i>
            <span>Data Kehadiran</span>
            </a>
        </li><!-- End Jabatan Nav -->
        @endif
    </ul>

    <form action="{{ route('auth.logout') }}" method="post"
    onsubmit="return confirm('Apakah anda yakin ingin keluar?')">
    @method('DELETE')
    @csrf
    <button class="w-full mt-4 d-block bg-transparent border-0 fw-bold text-danger px-3">Keluar</button>
    </form>

</nav><!-- End Sidebar-->
