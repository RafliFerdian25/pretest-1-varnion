<div class="sidebar-content">
    {{-- user --}}
    <div class="user">
        <div class="avatar-sm float-left mr-2">
            <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}" alt="profile photo admin"
                class="avatar-img rounded-circle">
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>Rafli Ferdian
                    {{-- <span class="user-level">Administrator</span>
                    <span class="caret"></span> --}}
                </span>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

    {{-- sidebar --}}
    <ul class="nav nav-primary">
        {{-- Daftar Pengguna --}}
        <li class="nav-item @if ($currentNav == 'user') active @endif">
            <a href="{{ route('user') }}">
                <i class="fas fa-user"></i>
                <p>Daftar Pengguna</p>
            </a>
        </li>
        {{-- Daftar Barang --}}
        <li class="nav-item @if ($currentNav == 'product') active @endif">
            <a href="{{ route('product') }}">
                <i class="fas fa-box"></i>
                <p>Daftar Barang</p>
            </a>
        </li>
        {{-- logout --}}
        @if (Auth::check())
            <li class="nav-item">
                <a href="/logout" onclick="logout()" class="hover-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        @endif
    </ul>
</div>
