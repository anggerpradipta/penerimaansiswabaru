<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $id = $_GET['id'];
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $querySekolah = $db->prepare('SELECT k.id AS id_kec, k.nama_kecamatan, s.id AS id_sekolah, s.nama_sekolah, s.alamat_sekolah FROM sekolah_asal s, kecamatan k WHERE s.id='.$id);
    $querySekolah->execute();
    $dataSekolah = $querySekolah->fetch();

    $queryKecamatan = $db->prepare('SELECT * FROM kecamatan');
    $queryKecamatan->execute();
    $dataKecamatan = $queryKecamatan->fetchAll();
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Form Edit Sekolah</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l6 offset-l3">
                <form action="sekolah_edit.php" method="post">
                    <div class="input-field col s12">
                        <input type="hidden" name="id_sekolah" value="<?php echo $dataSekolah['id_sekolah']; ?>"  />
                        <input id="nama_sekolah" type="text" name="nama_sekolah" value="<?php echo $dataSekolah['nama_sekolah']; ?>" class="validate">
                        <label for="nama_sekolah">Nama Sekolah</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="id_kecamatan" id="nama_kecamatan" class="material-select">
                            <option disabled>Pilih Kecamatan</option>
                            <option value="<?php echo $dataSekolah['id_kec']; ?>" selected><?php echo $dataSekolah['nama_kecamatan']; ?></option>
                            <?php foreach ($dataKecamatan as $item): ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['nama_kecamatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="alamat_sekolah" name="alamat_sekolah" class="materialize-textarea"><?php echo $dataSekolah['alamat_sekolah']; ?></textarea>
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                    </div>
                    <div class="col s12">
                        <button class="btn blue col s12" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
            </div>
    </div>
<?php
    require_once 'footer.php';
?>