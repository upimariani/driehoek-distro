<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Produk Masuk</h1>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h6>Masukkan Data Produk Masuk</h6>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <?php echo form_open_multipart('Admin/cProdukMasuk/create'); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <select class="form-control" name="produk" id="produk" required>
                                    <option value="">---Pilih Produk---</option>
                                    <?php
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                                <?= form_error('produk', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size Produk</label>
                                <select class="form-control" name="size" id="size" required>

                                </select>
                                <?= form_error('size', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tanggal Masuk</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="date" name="tgl" class="form-control" id="exampleInputFile" required>
                                    </div>
                                </div>
                                <?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Quantity Masuk</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="number" name="qty" class="form-control" id="exampleInputFile" required>
                                    </div>
                                </div>
                                <?= form_error('qty', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <input type="hidden" name="stok" class="stok">
                            <div class="input-group">
                                <button type="submit" class="btn btn-info mt-3">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>