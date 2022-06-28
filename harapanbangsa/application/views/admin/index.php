<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelUser->getUserWhere(['is_active' => 1])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Donatur</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelDonasi->getDonatur()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('buku'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Donasi
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white"> <?php $where = ['jumlah_donasi != 0'];
                                                                                $totaldonasi = $this->ModelDonasi->total('jumlah_donasi', $where);
                                                                                echo $totaldonasi; ?>
                            </div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Yayasan</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelDonasi->getYayasan()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user'); ?>"><i class="fas fa-shopping-cart fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="row">
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header"> <span class="fas fa-users text-primary mt-2 "> Data User</span>
                <a class="text-danger" href="<?php echo base_url('user/datauser'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Tanggal Registrasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($anggota as $a) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('d M Y', $a['tanggal_input']); ?></td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header"> <span class="fas fa-book text-warning mt-2"> Data Donatur</span>
                <a href="<?= base_url('donasi/donatur'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Donatur</th>
                            <th>No Telepon/Hp</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($donatur as $d) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d['nama_donatur']; ?></td>
                                <td><?= $d['telepon_donatur']; ?></td>
                                <td><?= $d['email']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header"> <span class="fas fa-users text-primary mt-2 "> Data Donasi</span>
                <a class="text-danger" href="<?php echo base_url('donasi'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Donasi</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah Donasi</th>
                        <th>Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($donasi as $o) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $o['jenis_donasi']; ?></td>
                            <td><?= $o['nama_donatur']; ?></td>
                            <td><?= $o['jumlah_donasi']; ?></td>
                            <td><?= date('d M Y', $o['tanggal_donasi']); ?></td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header"> <span class="fas fa-book text-warning mt-2"> Data Yayasan</span>
                <a href="<?= base_url('donasi/yayasan'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Yayasan</th>
                            <th>No Telepon/Hp</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($yayasan as $y) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $y['nama_yayasan']; ?></td>
                                <td><?= $y['no_telepon/hp']; ?></td>
                                <td><?= $y['alamat']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header"> <span class="fas fa-users text-primary mt-2 "> Data Anak Asuh</span>
                <a class="text-danger" href="<?php echo base_url('donasi/anak'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Anak Asuh</th>
                            <th>No Telepon/Hp</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($anak as $n) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $n['nama_anak']; ?></td>
                                <td><?= $n['no_telepon/hp']; ?></td>
                                <td><?= $n['alamat']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of row table-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->