<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Driehoek Distro</h1>
                    <a href="<?= base_url('Admin/cUser/create') ?>">Create New User Akun</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">Informasi User Akun Driehoek Distro</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->password ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($value->level_user == '1') {
                                                    echo '<span class="badge badge-warning">Pemilik</span>';
                                                } else if ($value->level_user == '2') {
                                                    echo '<span class="badge badge-success">Admin Gudang</span>';
                                                } else if ($value->level_user == '3') {
                                                    echo '<span class="badge badge-info">Sales</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Admin/cUser/edit/' . $value->id_user) ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-app">
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
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level User</th>
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