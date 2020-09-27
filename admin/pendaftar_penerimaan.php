<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $id = $_GET['id'];
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare('SELECT pendaftar.*, sekolah_asal.nama_sekolah FROM pendaftar, sekolah_asal  WHERE pendaftar.id='.$id);
    $query->execute();
    $data = $query->fetch();
?>
    <div class="row">
            <div class="col s12">
                <h5 class="blue-text center-align">Detail Pendaftar</h5>
                <div class="divider"></div>
                <br/>
            </div>
            <div class="col s12 l8 offset-l2">
                <table class="bordered">
                    <tr>
                        <td>Nomor Pendaftaran</td>
                        <td>: <?php echo $data['no_daftar']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pendaftar</td>
                        <td>: <?php echo $data['nama_pendaftar']; ?></td>
                    </tr>
                    <tr>
                        <td>Sekolah Asal</td>
                        <td>: <?php echo $data['nama_sekolah']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>: <?php echo $data['tempat_lahir'].', '.$data['tanggal_lahir']; ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>: <?php echo $data['agama']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Orang Tua</td>
                        <td>: <?php echo $data['nama_ortu']; ?></td>
                    </tr>
                    <tr>
                        <td>NEM</td>
                        <td>: <?php echo substr($data['nem'], 0, 2); ?></td>
                    </tr>
                </table>
                <div class="col s12 m5 padding-horizontal">
                    <a href="penerimaan.php?penerimaan=1&no_pendaftar=<?php echo $data['no_daftar']; ?>" class="btn blue col s12 z-depth-0">Terima</a>
                </div>
                <div class="col s12 m5 offset-m2 padding-horizontal">
                    <a href="penerimaan.php?penerimaan=0&no_pendaftar=<?php echo $data['no_daftar']; ?>" class="btn red col s12 z-depth-0">Gagal</a>
                </div>
                
            </div>
    </div>
<?php
    require_once 'footer.php';
?>