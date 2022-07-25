<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
            <?php
            if ($this->session->userdata('error')) {
                echo '<div class="callout callout-danger">
                    <h5>I am a danger callout!</h5>';
                echo $this->session->userdata('error');
                echo '</div>';
            }
            ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <form action="<?= base_url('Sales/cKatalog/add_cart') ?>" method="POST">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                <img src="<?= base_url('asset/foto-produk/' . $detail['menu']->gambar)  ?>" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3"><?= $detail['menu']->nama_produk ?></h3>
                            <?= $detail['menu']->deskripsi ?>
                            <hr>
                            <h5>Stok : <strong class="stok"><?= $detail['menu']->stok ?></strong> pcs</h5>
                            <h4 class="mt-3">Size <small>Please select one</small></h4>
                            <select name="id" class="form-control" id="size" required>
                                <option value="">---Pilih Ukuran---</option>
                                <?php
                                foreach ($detail['size'] as $key => $value) {
                                ?>
                                    <option data-size="<?= $value->nama_size ?>" data-price="<?= $value->harga_jual ?>" data-stok="<?= $value->stok ?>" data-harga="<i class='fas fa-tag'></i> Rp.<?= number_format($value->harga_jual)  ?>" value="<?= $value->id_size ?>" <?php if ($detail['menu']->nama_size == $value->nama_size) {
                                                                                                                                                                                                                                                                                echo 'selected';
                                                                                                                                                                                                                                                                            } ?>><?= $value->nama_size ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <h4 class="mt-3">Quantity</h4>
                            <input type="number" name="qty" class="form-control" min="1" value="1">
                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0 harga">
                                    <i class="fas fa-tag"></i> Rp. <?= number_format($detail['menu']->harga_jual, 0) ?>
                                </h2>
                            </div>
                            <input type="hidden" name="name" value="<?= $detail['menu']->nama_produk ?>">
                            <input type="hidden" name="price" class="price" value="<?= $detail['menu']->harga_jual ?>">
                            <input type="hidden" name="stok" class="stok" value="<?= $detail['menu']->stok ?>">
                            <input type="hidden" name="id_produk" value="<?= $id ?>">
                            <input type="hidden" name="size" class="size" value="<?= $detail['menu']->nama_size ?>">
                            <input type="hidden" name="picture" value="<?= $detail['menu']->gambar ?>">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </button>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->