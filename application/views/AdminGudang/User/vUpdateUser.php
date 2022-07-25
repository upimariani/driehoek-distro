<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Akun User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Akun User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Admin/cUser/edit/' . $user->id_user) ?>" method="POST" class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama User</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?= $user->nama_user ?>" name="nama" class="form-control" id="inputEmail3" placeholder="Masukkan Nama User">
                                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">No Telepon</label>
                                            <div class="col-sm-12">
                                                <input type="number" value="<?= $user->no_hp ?>" name="no_hp" class="form-control" id="inputEmail3" placeholder="Masukkan No Telepon">
                                                <?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Masukkan Alamat"><?= $user->alamat ?></textarea>
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="username" class="form-control" value="<?= $user->username ?>" id="inputEmail3" placeholder="Masukkan Username">
                                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="password" class="form-control" value="<?= $user->password ?>" id="inputEmail3" placeholder="Masukkan Password">
                                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Level User</label>
                                            <div class="col-sm-12">
                                                <select name="user" class="form-control">
                                                    <option value=" ">---Pilih Level User---</option>
                                                    <option value="1" <?php if ($user->level_user == '1') {
                                                                            echo 'selected';
                                                                        } ?>>Pemilik</option>
                                                    <option value="2" <?php if ($user->level_user == '2') {
                                                                            echo 'selected';
                                                                        } ?>>Admin Gudang</option>
                                                    <option value="3" <?php if ($user->level_user == '3') {
                                                                            echo 'selected';
                                                                        } ?>>Sales</option>
                                                    <option value="4" <?php if ($user->level_user  == '4') {
                                                                            echo 'selected';
                                                                        } ?>>Bag Keuangan</option>
                                                </select>
                                                <?= form_error('user', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <button class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>