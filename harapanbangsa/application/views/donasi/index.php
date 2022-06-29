<!-- Begin Page Content -->
<div class="container-fluid"> <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12"> <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?>
                </div> <?php } ?> <?= $this->session->flashdata('pesan'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Donasi</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Nomor Telepon/Hp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jumlah Donasi</th>
                        <th scope="col">Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody> <?php $i = 1;
                        foreach ($donasi as $d) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['jenis_donasi']; ?></td>
                            <td><?= $d['nama_donatur']; ?></td>
                            <td><?= $d['no_telepon/hp']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['jumlah_donasi']; ?></td>
                            <td><?= date('d M Y', $d['tanggal_donasi']); ?></td>
                            <td> <a href="<?= base_url('donasi/hapusDonasi/') . $d['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $d['nama_donatur']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>