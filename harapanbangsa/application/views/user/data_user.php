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
                        <th scope="col">Nama User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role ID</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Tanggal Registrasi</th>
                    </tr>
                </thead>
                <tbody> <?php $i = 1;
                        foreach ($anggota as $a) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('d M Y', $a['tanggal_input']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>