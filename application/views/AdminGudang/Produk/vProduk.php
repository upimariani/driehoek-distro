<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk</h1>
                    <a href="<?= base_url('Admin/cKelolaProduk/create') ?>">Create New Produk</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
            <?php
            if ($this->session->userdata('success')) {
            ?>
                <div class="callout callout-success">
                    <h5>I am a success callout!</h5>

                    <p><?= $this->session->userdata('success') ?></p>
                </div>
            <?php
            }
            ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td class="text-center"><img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
                                            <td>Nama Produk:<strong> <?= $value->nama_produk ?></strong><br>
                                                Kategori: <?= $value->nama_kategori ?></td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cKelolaProduk/edit/' . $value->id_produk) ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('Admin/cKelolaProduk/delete/' . $value->id_produk) ?>" class="btn btn-app">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                                <a href="<?= base_url('Admin/cKelolaProduk/size/' . $value->id_produk) ?>" class="btn btn-app">
                                                    <i class="fas fa-ruler-combined"></i> Size
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>