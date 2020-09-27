<?php 
    require_once 'config/koneksi.php';
    require_once 'header.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $queryKec = $db->prepare('SELECT * FROM kecamatan');

    $queryKec->execute();
    $dataKec = $queryKec->fetchAll();
?>
    <form action="daftar_insert.php" method="post"  name="daftar" class="row padding-horizontal">
        <div class="col s12 m4 l6 border">
            <h5>Petunjuk pengisian form</h5>
            <div class="divider"></div>
            <p>Isi kolom sesuai keterangan</p>
            <p class="padding-bottom">Semua bidang isian bertanda <span class="red-text">*</span> tidak boleh kosong</p>
        </div>
        <div class="col s12 m8 l6">
            <div class="col s12">
                <h5 class="center-align">Form Pendaftaran Siswa Baru</h5>
                <div class="divider"></div>
                <div class="padding-bottom"></div>
            </div>
            <div class="input-field inline col s12">
                <input  id="nama_lengkap" type="text" name="nama_lengkap" class="validate">
                <label for="nama_lengkap">Nama Lengkap <span class="red-text">*</span></label>
                <i class="nama_lengkap_invalid red-text"></i>
                
            </div>
            <div class="col s12">
                <p class="grey-text">Jenis Kelamin <span class="red-text">*</span></p>
                <input class="with-gap" name="jk" type="radio" value="Laki-Laki" id="jk_laki" />
                <label for="jk_laki">Laki-Laki</label> &nbsp; &nbsp;
                <input class="with-gap" name="jk" type="radio" value="Perempuan" id="jk_perempuan" />
                <label for="jk_perempuan">Perempuan</label>
                <br/>
                <i class="jk_invalid red-text"></i>
                <p class="padding-bottom"></p>
            </div>
            <div class="input-field inline col s12">
                <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
                <label for="alamat">Alamat Rumah <span class="red-text">*</span></label>
                <i class="alamat_invalid red-text"></i>
            </div>
            <div class="input-field inline col s12">
                <input  id="tempat_lahir" type="text" name="tempat_lahir" class="validate">
                <label for="tempat_lahir">Tempat Lahir <span class="red-text">*</span></label>
                <i class="tempat_lahir_invalid red-text"></i>
            </div>
            <div class="input-field inline  col s12">
                <input  id="tanggal_lahir" type="text" name="tanggal_lahir" class="datepicker">
                <label for="tanggal_lahir">Tanggal Lahir <span class="red-text">*</span></label>
                <i class="tanggal_lahir_invalid red-text"></i>
            </div>
            <div class="col s12">
                <p class="grey-text">Sekolah Asal  <span class="red-text">*</span></p>
                <select id="kecamatan" name="kecamatan" class="browser-default col s12 m6">
                    <option value="" disabled selected>Pilih Kecamatan</option>
                    <?php foreach ($dataKec as $itemKec): ?>
                        <option value="<?php echo $itemKec['id']; ?>"><?php echo $itemKec['nama_kecamatan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="sekolah" name="sekolah" class="browser-default col s12 m6">
                    <option value="" disabled selected>Pilih Sekolah</option>
                </select>
                <i class="kec_sekolah_invalid red-text"></i>
            </div>
            <div class="col s12 padding-top padding-bottom">
                <label for="agama">Agama  <span class="red-text">*</span></label>
                <select class="browser-default" name="agama" id="agama">
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindhu">Hindhu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                <i class="agama_invalid red-text"></i>
            </div>
            <div class="input-field inline col s12 ">
                <input  id="nama_ortu" type="text" name="nama_ortu" class="validate">
                <label for="nama_ortu">Nama Orang Tua/Wali <span class="red-text">*</span></label>
                <i class="nama_ortu_invalid red-text"></i>
            </div>
            <div class="input-field inline col s12 padding-bottom">
                <input  id="nem" type="text" name="nem" class="validate">
                <label for="nem">NEM <span class="red-text">*</span></label>
                <i class="nem_invalid red-text"></i>
                <i class="number_only red-text"></i>
            </div>
            <div class="col s12 m6 padding-bottom">
                <button type="submit" name="submit_daftar" class="btn green accent-4 col s12 z-depth-0" id="submit_daftar">SIMPAN</button>
            </div>
            <div class="col s12 m6 padding-bottom">
                <button type="reset" class="btn grey accent-4 col s12 z-depth-0">RESET</button>
            </div>
        </div>
    </form>
<?php require_once 'footer.php'; ?>