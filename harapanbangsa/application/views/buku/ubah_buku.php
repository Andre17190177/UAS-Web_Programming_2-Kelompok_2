<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message">Data buku tidak boleh Kosong</div>');
                redirect('buku/ubahbuku/' . $b['id_buku']);
            } ?>
            <?php foreach ($buku as $b) { ?>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $b['judul_buku']; ?>">
                    </div>
                    <div class="form-group">

                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option> <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value="<?= $b['pengarang']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value="<?= $b['penerbit']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <select name="tahun" class="form-control form-control-user">
                            <option value="">Pilih Tahun</option> <?php for ($i = date('Y'); $i > 1000; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="<?= $b['isbn']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $b['stok']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $b['id_buku']; ?>">
                        <input type="file" class="form-control form-control-user" id="image" name="image" value="<?= $b['image']; ?>">
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