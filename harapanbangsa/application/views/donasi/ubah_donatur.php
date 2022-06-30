<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Nama Kategori tidak boleh Kosong</div>');
                redirect('donasi/ubah_donatur/' . $o['id']);
            } ?>
            <?php foreach ($donatur as $o) { ?>
                <form action="<?= base_url('donasi/ubahdonatur'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $o['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_donatur" name="nama_donatur" placeholder="Masukkan Nama Donatur" value="<?= $o['nama_donatur']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $o['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="telepon_donatur" name="telepon_donatur" placeholder="Masukkan Nomor Telepon/Hp" value="<?= $o['telepon_donatur']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $o['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= $o['email']; ?>">
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