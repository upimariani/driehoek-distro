<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->


            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Sales</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('Sales/cKatalog') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cKatalog') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="nav-icon fas fa-barcode"></i>
                                <p>
                                    Menu Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cTransaksi') {
                                                                echo 'menu-open';
                                                            }
                                                            if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cLaporan') {
                                                                echo 'menu-open';
                                                            }  ?>">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Transaksi Sales
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Sales/cTransaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cTransaksi') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Sales/cLaporan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cLaporan') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('cLogin/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>