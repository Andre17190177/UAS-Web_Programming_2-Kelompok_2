<!-- Begin Page Content -->
<div class="container-fluid"><?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-3">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?>
                </div> <?php } ?> <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#anakBaruModal"><i class="fas fa-file-alt"></i> Tambah Data Anak</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anak Asuh</th>
                        <th scope="col">Nomor Telepon/Hp</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($anak as $n) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $n['nama_anak']; ?></td>
                            <td><?= $n['no_telepon/hp']; ?></td>
                            <td><?= $n['alamat']; ?></td>
                            <td> <a href="<?= base_url('donasi/ubahAnak/') . $n['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('donasi/hapusAnak/') . $n['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $n['nama_anak']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah kategori baru-->
<div class="modal fade" id="anakBaruModal" tabindex="-1" role="dialog" aria-labelledby="anakBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anakBaruModalLabel">Tambah Data Anak Asuh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('donasi/anak'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_anak" name="nama_anak" placeholder="Masukkan Nama Anak Asuh">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_telepon/hp" name="no_telepon/hp" placeholder="Masukkan Nomor Telepon/Hp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Anak Asuh">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->