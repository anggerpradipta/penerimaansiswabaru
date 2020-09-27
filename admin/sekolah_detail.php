<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $id = $_GET['id'];
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare('SELECT k.nama_kecamatan, s.nama_sekolah, s.alamat_sekolah FROM sekolah_asal s, kecamatan k WHERE s.id='.$id);
    $query->execute();
    $data = $query->fetch();
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Detail Sekolah</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l8 offset-l2">
                <table class="bordered">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: <?php echo $data['nama_sekolah']; ?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>: <?php echo $data['nama_kecamatan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>: <?php echo $data['alamat_sekolah']; ?></td>
                    </tr>
                </table>
            </div>
    </div>
<?php
    require_once 'footer.php';
?>