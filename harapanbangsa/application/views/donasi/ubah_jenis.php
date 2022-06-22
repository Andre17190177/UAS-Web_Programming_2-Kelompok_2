<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Nama Kategori tidak boleh Kosong</div>');
                redirect('donasi/ubah_jenis/' . $j['id']);
            } ?>
            <?php foreach ($jenis as $j) { ?>
                <form action="<?= base_url('donasi/ubahjenis'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $j['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="jenis_donasi" name="jenis_donasi" placeholder="Masukkan Jenis Donasi" value="<?= $j['jenis_donasi']; ?>">
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