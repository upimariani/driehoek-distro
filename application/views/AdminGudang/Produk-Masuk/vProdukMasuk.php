<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Masuk</h1>
                    <a href="<?= base_url("Admin/cProdukMasuk/create") ?>">Create Produk Masuk</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk Masuk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Produk Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Quantity Masuk</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk_masuk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?> | Size: <?= $value->nama_size ?></td>
                                            <td><?= $value->tgl_masuk ?></td>
                                            <td><?= $value->qty_masuk ?> pcs</td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cProdukMasuk/edit/' . $value->id_produk_masuk) ?>" class="btn btn-app btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('Admin/cProdukMasuk/delete/' . $value->id_produk_masuk) ?>" class="btn btn-app btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
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
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Quantity Masuk</th>
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