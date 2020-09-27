<?php 
    require_once 'header.php';
    require_once 'config/koneksi.php';

    session_start();
    $noDaftar = $_SESSION['noDaftar'];

    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();

    $query = $db->prepare("SELECT p.*, s.nama_sekolah FROM pendaftar AS p LEFT JOIN sekolah_asal AS s ON p.id_sekolah = s.id WHERE p.no_daftar ='".$noDaftar."' ");
    $query->execute();
    $data = $query->fetch();
?>
<?php  ?>
<div class="row padding-top">
    <div class="col s12">
        <h5 class="center-align">Hasil Pendaftaran</h5>
        <div class="divider"></div>
    </div>
    <div class="col s12 m8 l6 offset-m2 offset-l3">
        <table>
            <tr>
                <td>Nomor Pendaftaran</td>
                <td>: <?php echo $data['no_daftar']; ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <?php echo $data['nama_pendaftar']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?php echo $data['jenis_kelamin']; ?></td>
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
                <td>NEM</td>
                <td>: <?php echo substr($data['nem'], 0, 2); ?></td>
            </tr>
        </table>
        
    </div>
</div>
<?php require_once 'footer.php'; ?>