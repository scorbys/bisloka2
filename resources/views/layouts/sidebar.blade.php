<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">Sistem Pemesanan</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->email }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            MASTER
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('bus.index') }} "
                                class="nav-link {{ ($menu==1 ? 'active' : '') }}">
                                <i class="fa fa-bus nav-icon"></i>
                                <p>Data Bus</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('brand.index') }} "
                                class="nav-link {{ ($menu==2 ? 'active' : '') }}">
                                <i class="fa fa-tags nav-icon"></i>
                                <p>Data Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('pegawai.index') }} "
                                class="nav-link {{ ($menu==3 ? 'active' : '') }}">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('pelanggan.index') }} "
                                class="nav-link {{ ($menu==4 ? 'active' : '') }}">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            TRANSAKSI
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('pemesanan.index') }} "
                                class="nav-link {{ ($menu==5 ? 'active' : '') }}">
                                <i class="fa fa-hdd-o nav-icon"></i>
                                <p>Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('pengembalian.index') }} "
                                class="nav-link {{ ($menu==6 ? 'active' : '') }}">
                                <i class="fa fa-credit-card nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>