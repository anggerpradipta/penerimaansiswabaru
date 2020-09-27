<?php
    require_once "../config/koneksi.php";
    require_once "header.php";
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare("SELECT * FROM kecamatan");
    $query->execute();
    $data = $query->fetchAll();
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Form Tambah Sekolah</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l6 offset-l3">
                <form action="sekolah_insert.php" method="post">
                    <div class="input-field inline col s12">
                        <input id="nama_sekolah" type="text" name="nama_sekolah" class="validate">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <i class="nama_sekolah_invalid red-text"></i>
                    </div>
                    <div class="input-field inline col s12">
                        <select name="id_kecamatan" id="nama_kecamatan" class="material-select">
                            <option disabled selected>Pilih Kecamatan</option>
                            <?php foreach ($data as $item): ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['nama_kecamatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                        <i class="kecamatan_invalid red-text"></i>
                    </div>
                    <div class="input-field inline padding-bottom col s12">
                        <textarea id="alamat_sekolah" name="alamat_sekolah" class="materialize-textarea"></textarea>
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <i class="alamat_sekolah_invalid red-text"></i>
                    </div>
                    <div class="col s12">
                        <button class="btn blue col s12" id="submit_sekolah" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
            </div>
    </div>
<?php
    require_once "footer.php";
?>