<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Nowak Helme</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>


                <li>
                    <a href="#masterdata" data-bs-toggle="collapse">
                        <i class="mdi mdi-lock-outline"></i>
                        <span> masterdata </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="masterdata">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('akun.index') }}"><i class="material-icons"></i><span
                                        class="hide-menu">Akun</span></a>
                            </li>
                            <li>
                                <a href="{{ route('barang.index') }}"><i class="material-icons"></i><span
                                        class="hide-menu">barang</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarPencatatan" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Pencatatan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPencatatan">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('produksi.index') }}"><i class="material-icons"></i><span
                                        class="hide-menu">Produksi</span></a>
                            </li>
                            <li>
                                <a href="{{ route('stok.index') }}">Persediaan</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Transaksi</li>

                <li>
                    <a href="#sidebarLaporan" data-bs-toggle="collapse">
                        <i class="mdi mdi-table"></i>
                        <span> Laporan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarLaporan">
                        <ul class="nav-second-level">
                            <li>
                                <a href="tables-daftarstok.html">Daftar stok</a>
                            </li>
                        </ul>
                    </div>
                </li>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
