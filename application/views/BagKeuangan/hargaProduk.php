<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Harga Produk</h1>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Create New Harga Produk
                    </button>
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
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Harga Pokok</th>
                                        <th class="text-center">Harga Jual</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk_jual as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_produk ?> | <?= $value->nama_size ?></td>
                                            <td class="text-center">Rp. <?= number_format($value->harga)  ?></td>
                                            <td class="text-center">Rp. <?= number_format($value->harga_jual)  ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_size ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Harga Pokok</th>
                                        <th class="text-center">Harga Jual</th>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('BagKeuangan/HargaProduk/harga_jual') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Harga Jual Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Produk</label>
                        <select class="form-control" name="produk" id="produk" required>
                            <option>---Pilih Produk Driehoek Distro---</option>
                            <?php
                            foreach ($produk as $key => $value) {
                            ?>
                                <option data-harga_seb="Rp. <?= number_format($value->harga)  ?>" value="<?= $value->id_size ?>"><?= $value->nama_produk ?> | Size <?= $value->nama_size ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga Pokok Produk</label>
                        <input type="text" class="harga_seb form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga Jual Produk</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Jual Produk" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($produk_jual as $key => $item) {
?>
    <div class="modal fade" id="edit<?= $item->id_size ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('BagKeuangan/HargaProduk/updatehargajual/' . $item->id_size) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Harga Jual Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Produk</label>
                            <input type="text" value="<?= $item->nama_produk ?> | Size <?= $item->nama_size ?>" class="form-control" id="exampleInputPassword1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Pokok Produk</label>
                            <input type="text" value="Rp. <?= number_format($item->harga) ?>" class="harga_seb form-control" id="exampleInputPassword1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Jual Produk</label>
                            <input type="number" name="harga" value="<?= $item->harga_jual ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Jual Produk" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
}
?>