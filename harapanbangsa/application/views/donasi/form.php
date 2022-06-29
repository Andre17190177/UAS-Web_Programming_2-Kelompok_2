<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Donasi</h1>
                        </div>
                        <form class="donasi" method="post" action="<?= base_url('donasi/form'); ?>">
                            <div class="form-group">
                                <select id="jenis_donasi" name="jenis_donasi" class="form-control form-control-user">
                                    <option value="">Pilih Jenis Donasi</option> <?php foreach ($jenis as $j) { ?>
                                        <option value="<?= $j['id']; ?>"><?= $j['jenis_donasi']; ?></option> <?php } ?>
                                </select>
                                <?= form_error('jenis_donasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_donatur" name="nama_donatur" placeholder="Nama Lengkap">
                                <?= form_error('nama_donatur', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_telepon/hp" name="no_telepon/hp" placeholder="Nomor Telepon/Hp">
                                <?= form_error('no_telepon/hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jumlah_donasi" name="jumlah_donasi" placeholder="Jumlah Donasi">
                                <?= form_error('jumlah_donasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-danger btn-user btn-block"> Kirim Donasi </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>