<!-- Begin Page Content -->
<div class="container-fluid"> <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12"> <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?>
                </div> <?php } ?> <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#donasiBaruModal"><i class="fas fa-file-alt"></i> Tambah Data Donasi</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Donasi</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Jumlah Donasi</th>
                        <th scope="col">Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody> <?php $a = 1;
                        foreach ($donasi as $d) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $d['jenis_donasi']; ?></td>
                            <td><?= $d['nama_donatur']; ?></td>
                            <td><?= $d['jumlah_donasi']; ?></td>
                            <td><?= $d['tanggal_donasi']; ?></td>
                            <td> <a href="<?= base_url('donasi/ubahdonasi/') . $d['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a> <a href="<?= base_url('donasi/hapusdonasi/') . $d['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $d['jenis_donasi']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a> </td>
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
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="donasiBaruModal" tabindex="-1" role="dialog" aria-labelledby="donasiBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donasiBaruModalLabel">Tambah Data Donasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('donasi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="jenis_donasi" class="form-control form-control-user">
                            <option value="">Pilih Jenis Donasi</option> <?php foreach ($jenis as $j) { ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis_donasi']; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_donatur" name="nama_donatur" placeholder="Masukkan nama donatur">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jumlah_donasi" name="jumlah_donasi" placeholder="Masukkan jumlah donasi">
                    </div>
                    <div class="form-group">
                        <select name="tanggal_donasi" class="form-control form-control-user">
                            <option value="">Pilih Tanggal Donasi</option> <?php for ($i = date('Y'); $i > 1949; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option> <?php } ?>
                        </select>
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