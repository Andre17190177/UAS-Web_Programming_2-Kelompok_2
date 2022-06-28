<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Nama Kategori tidak boleh Kosong</div>');
                redirect('donasi/ubah_yayasan/' . $y['id']);
            } ?>
            <?php foreach ($yayasan as $y) { ?>
                <form action="<?= base_url('donasi/ubahyayasan'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $y['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_yayasan" name="nama_yayasan" placeholder="Masukkan Nama Yayasan" value="<?= $y['nama_yayasan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $y['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="no_telepon/hp" name="no_telepon/hp" placeholder="Masukkan Nomor Telepon/Hp" value="<?= $y['no_telepon/hp']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $y['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan alamat Yayasan" value="<?= $y['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>