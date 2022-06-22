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
            <a href="#" class="brand-link">
                <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                <span class="brand-text font-weight-light">ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">DRIEHOEK DISTRO</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaProduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaProduk') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Kelola Data Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaKategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaKategori') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>
                                    Kelola Data Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cUser') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cUser') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Kelola Data User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cProdukMasuk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cProdukMasuk') {
                                                                                                echo 'active';
                                                                                            }  ?>">
                                <i class="nav-icon fas fa-barcode"></i>

                                <p>
                                    Produk Masuk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cTransaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi') {
                                                                                                echo 'active';
                                                                                            }  ?>">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
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