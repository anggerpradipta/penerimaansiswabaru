<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $queryPendaftar = $db->prepare('SELECT pendaftar.nama_pendaftar, pendaftar.nem, sekolah_asal.nama_sekolah FROM pendaftar, sekolah_asal WHERE pendaftar.id_sekolah = sekolah_asal.id ORDER BY pendaftar.id DESC');
    $queryPendaftar->execute();
    $dataPendaftar = $queryPendaftar->fetchAll();
?>
<div class="row">
        <div class="col s12">
            <h5 class="center-align blue-text">Laporan Semua Pendaftar</h5>
            <div class="divider"></div>
        </div>
        <div id="pendaftar" class="col s12 padding-top">
        <?php if (count($dataPendaftar) == 0) { ?>
                <p class="center-align red-text">Tidak ada data untuk ditampilkan</p>
        <?php
            } else {
            $no = 1;
        ?>
                <h5>Jumlah Semua Pendaftar : <?php echo count($dataPendaftar); ?></h5>
                <table class="bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Sekolah Asal</th>
                            <th>NEM</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataPendaftar as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item['nama_pendaftar']; ?></td>
                            <td><?php echo $item['nama_sekolah']; ?></td>
                            <td><?php echo $item['nem'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="cetak_laporan_semua_pendaftar.php" class="btn-floating btn-large blue tooltipped" data-position="left" data-tooltip="Cetak">
                        <i class="material-icons large">print</i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>