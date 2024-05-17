<div class="sidebar-content">
    {{-- user --}}
    <div class="user">
        <div class="avatar-sm float-left mr-2">
            <img src="{{ asset('assets/img/dummy/profile-placeholder.png') }}" alt="profile photo admin"
                class="avatar-img rounded-circle">
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>Petugas
                    <span class="user-level">Administrator</span>
                    <span class="caret"></span>
                </span>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

    {{-- sidebar --}}
    <ul class="nav nav-primary">
        {{-- Daftar Pengguna --}}
        <li class="nav-item @if ($currentNav == 'user') active @endif">
            <a href="{{ route('home') }}">
                <i class="fas fa-user"></i>
                <p>Daftar Pengguna</p>
            </a>
        </li>
        {{-- rent --}}
        <li class="nav-item @if ($currentNav == 'rent') active @endif">
            <a data-toggle="collapse" href="#rentMenu">
                <i class="fas fa-box"></i>
                <p>Peminjaman</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="rentMenu">
                <ul class="nav nav-collapse">
                    <li class="@if ($currentNavChild == 'index') active @endif">
                        <a href="{{ route('home') }}">
                            <span class="sub-item">Daftar Pinjam</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
