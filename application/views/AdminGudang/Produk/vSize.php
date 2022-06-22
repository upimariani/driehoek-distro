<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Size Produk</h1>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Create New Size
                    </button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk Size</li>
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
                            <h3 class="card-title">Informasi Size Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Size</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($size as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_produk ?></td>
                                            <td class="text-center"><?= $value->nama_size ?></td>
                                            <td class="text-center"><?= $value->harga ?></td>
                                            <td class="text-center"><?= $value->stok ?></td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_size ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="<?= base_url('Admin/cKelolaProduk/delete_size/' . $value->id_size . '/' . $value->id_produk) ?>" class="btn btn-app">
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
                                        <th class="text-center">Nama Size</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Stok</th>
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

<form action="<?= base_url('Admin/cKelolaProduk/create_size') ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Size</h4>
                    <input type="hidden" name="produk" value="<?= $id ?>">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Size</label>
                        <input type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Produk</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="number" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Enter Stok" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>

<?php
foreach ($size as $key => $value) {
?>
    <form action="<?= base_url('Admin/cKelolaProduk/update_size/' . $value->id_size) ?>" method="POST">
        <div class="modal fade" id="edit<?= $value->id_size ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Size</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Size</label>
                            <input type="hidden" name="produk" value="<?= $value->id_produk ?>">
                            <input type="text" name="size" value="<?= $value->nama_size ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="number" name="harga" value="<?= $value->harga ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="number" name="stok" value="<?= $value->stok ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Stok" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
<?php
}
?>