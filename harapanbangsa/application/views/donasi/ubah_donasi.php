<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Data buku tidak boleh Kosong</div>');
                redirect('donasi/ubah_donasi/' . $d['id']);
            } ?>
            <?php foreach ($donasi as $d) { ?>
                <form action="<?= base_url('donasi/ubahdonasi'); ?>" method="post">
                    <div class="form-group">
                        <select name="jenis_donasi" class="form-control form-control-user">
                            <option value="">Pilih Jenis Donasi</option> <?php foreach ($jenis as $j) { ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis_donasi']; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_donatur" name="nama_donatur" placeholder="Masukkan nama donatur" value="<?= $d['nama_donatur']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="jumlah_donasi" name="jumlah_donasi" placeholder="Masukkan jumlah_donasi" value="<?= $d['jumlah_donasi']; ?>">
                    </div>

                    <div class="form-group">
                        <select name="tanggal_donasi" class="form-control form-control-user">
                            <option value="">Pilih Tanggal Donasi</option> <?php for ($i = date('Y'); $i > 1949; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option> <?php } ?>
                        </select>
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