<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Nama Kategori tidak boleh Kosong</div>');
                redirect('donasi/ubah_anak/' . $n['id']);
            } ?>
            <?php foreach ($anak as $n) { ?>
                <form action="<?= base_url('donasi/ubahAnak'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $n['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_anak" name="nama_anak" placeholder="Masukkan Nama Anak Asuh" value="<?= $n['nama_anak']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $n['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="no_telepon/hp" name="no_telepon/hp" placeholder="Masukan Nomor Telepon/Hp" value="<?= $n['no_telepon/hp']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $n['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Anak Asuh" value="<?= $n['alamat']; ?>">
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