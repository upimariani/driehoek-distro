<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Produk</li>
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

                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <?php echo form_open_multipart('Admin/cKelolaProduk/edit/' . $produk->id_produk); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value=" ">---Pilih Kategori Produk---</option>
                                    <?php
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_kategori ?>" <?php if ($produk->id_kategori == $value->id_kategori) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $value->nama_kategori ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Produk</label>
                                <input type="text" value="<?= $produk->nama_produk ?>" name="produk" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Produk">
                                <?= form_error('produk', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Deskripsi</label>
                                <div class="mb-3">
                                    <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $produk->deskripsi ?></textarea>
                                    <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <label for="exampleInputFile">Gambar</label><br>
                            <img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $produk->gambar) ?>">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="form-control" id="exampleInputFile">
                                </div>
                            </div>
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