<nav id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home.*') ? 'collapsed' : '' }}" aria-current="page" href="{{ route('home.index') }}">
            <i class="bi bi-house-door-fill"></i>
            <span class="align-text-bottom"></span>
            Beranda
            </a>
        </li><!-- End Dashboard Nav -->
    </ul>

    <form action="{{ route('auth.logout') }}" method="post"
    onsubmit="return confirm('Apakah anda yakin ingin keluar?')">
    @method('DELETE')
    @csrf
    <button class="w-full mt-4 d-block bg-transparent border-0 fw-bold text-danger px-3">Keluar</button>
    </form>

</nav><!-- End Sidebar-->
