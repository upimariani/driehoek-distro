<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Katalog Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Katalog</li>
                    </ol>
                </div>

                <?php
                $qty = 0;
                foreach ($this->cart->contents() as $key => $value) {
                    $qty += $value['qty'];
                }
                ?>
                <a href="<?= base_url('Sales/cKatalog/cart') ?>" class="btn btn-app mt-3">
                    <span class="badge bg-success"><?= $qty ?></span>
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
            </div>
            <?php
            if ($this->session->userdata('success')) {
                echo '<div class="callout callout-success">
                    <h5>I am a success callout!</h5>';
                echo $this->session->userdata('success');
                echo '</div>';
            }
            ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    <?php
                    foreach ($menu as $key => $value) {
                    ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <?= $value->nama_kategori ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $value->nama_produk ?></b></h2>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li><span class="fa-li"><i class="fas fa-tag"></i></span>Harga: Rp. <?= number_format($value->harga_jual) ?></li>
                                                <li><span class="fa-li"><i class="fas fa-ruler-combined"></i></span> Size: <?= $value->nama_size ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="<?= base_url('Sales/cKatalog/detail_produk/' . $value->id_produk) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-align-justify"></i> Detail Produk
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->