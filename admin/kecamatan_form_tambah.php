<?php
    require_once "../config/koneksi.php";
    require_once "header.php";
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Form Tambah Kecamatan</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l6 offset-l3">
                <form action="kecamatan_insert.php" method="post">
                    <div class="input-field col s12">
                        <input id="nama_kecamatan" type="text" name="nama_kecamatan" class="validate">
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                    </div>
                    <div class="col s12">
                        <button class="btn blue col s12" id="submit_kecamatan" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
            </div>
    </div>
<?php
    require_once "footer.php";
?>