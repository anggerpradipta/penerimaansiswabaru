<?php
    require_once "../config/koneksi.php";
    require_once "header.php";
    $id = $_GET['id'];
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare("SELECT * FROM kecamatan WHERE id=".$id);
    $query->execute();
    $data = $query->fetch();
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Form Edit Kecamatan</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l6 offset-l3">
                <form action="kecamatan_edit.php" method="post">
                    <div class="input-field col s12">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input id="nama_kecamatan" type="text" name="nama_kecamatan" value="<?php echo $data['nama_kecamatan']; ?>" class="validate">
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                    </div>
                    <div class="col s12">
                        <button class="btn blue col s12" type="submit" name="submit">EDIT</button>
                    </div>
                </form>
            </div>
    </div>
<?php
    require_once "footer.php";
?>