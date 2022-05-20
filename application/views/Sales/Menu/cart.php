<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi Cart</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Keranjang</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <?php echo form_open('Sales/cKatalog/update_cart'); ?>
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Nama Produk
                            </th>
                            <th style="width: 30%">
                                Gambar
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th style="width: 8%" class="text-center">
                                Harga
                            </th>
                            <th style="width: 8%" class="text-center">
                                SubTotal
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($cart as $key => $value) {
                        ?>

                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        <?= $value['name'] ?>
                                    </a>
                                    <br />
                                    <small>
                                        Size <?= $value['size'] ?>
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>">
                                        </li>
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <input type="number" name="<?= $i . '[qty]' ?>" min="1" max="<?= $value['stok'] ?>" value="<?= $value['qty'] ?>" class="form-control">
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-warning">Rp. <?= number_format($value['price'])  ?></span>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Rp. <?= number_format($value['price'] * $value['qty'])  ?></span>
                                </td>
                                <td class="project-actions text-right">
                                    <button type="submit" class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Update
                                    </button>
                                    <a href="<?= base_url('Sales/cKatalog/delete_cart/' . $value['rowid']) ?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="mt-3">
                                <h4>Total <strong>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></strong></h4><br>
                                <hr>
                                <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-sm"><i class="far fa-credit-card"></i> Checkout</button>
                                <a href="<?= base_url('Sales/cKatalog') ?>" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
                            </td>
                        </tr>

                    </tbody>
                </table>


                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form role="form" action="<?= base_url('Sales/cKatalog/checkout') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Checkout Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter Atas Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Telepon</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Enter No Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Enter Alamat" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="total" class="pembayaran">
                <?php $id_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                ?>
                <input type="hidden" name="id_order" value="<?= $id_order ?>">
                <input type="hidden" name="total" value="<?= $this->cart->total() ?>">
                <?php
                $i = 1;
                foreach ($this->cart->contents() as $items) {
                    echo form_hidden('qty' . $i++, $items['qty']);
                }
                ?>
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