<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Transaksi Sales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Penjualan Sales</h3>
                    </div>
                    <div class="card-body">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Laporan Sales Driehoek Distro</strong><br>
                                        Laporan Penjualan Driehoek Distro
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Transaksi</th>
                                                <th>Atas Nama</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $grand_total = 0;
                                            foreach ($transaksi as $key => $value) {
                                                $grand_total += $value->total_bayar;
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->id_order ?></td>
                                                    <td><?= $value->atas_nama ?></td>
                                                    <td><?= $value->tgl_order ?></td>
                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>Total</td>
                                                <td>
                                                    <h5>Rp. <?= number_format($grand_total, 0) ?></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->



                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
    </section>
</div>