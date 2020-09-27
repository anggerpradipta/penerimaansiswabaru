<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $queryPendaftar = $db->prepare('SELECT pendaftar.id, pendaftar.nama_pendaftar, sekolah_asal.nama_sekolah FROM pendaftar, sekolah_asal WHERE pendaftar.id_sekolah = sekolah_asal.id ORDER BY pendaftar.id DESC');
    $queryPendaftar->execute();
    $dataPendaftar = $queryPendaftar->fetchAll();

    $queryPenerimaan = $db->prepare('SELECT id, nama_pendaftar, nem FROM pendaftar WHERE no_daftar NOT IN (SELECT no_pendaftar FROM penerimaan)');
    $queryPenerimaan->execute();
    $dataPenerimaan = $queryPenerimaan->fetchAll();
?>
    <div class="row">
        <div class="col s12">
            <ul class="tabs grey lighten-4">
                <li class="tab col s6"><a href="#pendaftar" class="blue-text">Pendaftar</a></li>
                <li class="tab col s6"><a href="#penerimaan" class="blue-text">Penerimaan</a></li>
                <li class="indicator blue"></li>
            </ul>
        </div>

        <div id="pendaftar" class="col s12 padding-top">
        <?php if (count($dataPendaftar) == 0) { ?>
                <p class="center-align red-text">Tidak ada data untuk ditampilkan</p>
        <?php
            } else {
                $no = 1; 
        ?>
                <table class="bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Sekolah Asal</th>
                            <th class="center-align">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataPendaftar as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item['nama_pendaftar']; ?></td>
                            <td><?php echo $item['nama_sekolah']; ?></td>
                            <td class="center-align">
                                <a href="pendaftar_detail.php?id=<?php echo $item['id']; ?>"><i class="material-icons blue-text">list</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        <?php } ?>
        </div>
        <div id="penerimaan" class="col s12 padding-top">
        <?php if (count($dataPenerimaan) == 0) { ?>
                <p class="center-align red-text">Tidak ada data untuk ditampilkan</p>
        <?php
            } else {
                $no = 1; 
        ?>
                <table class="bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NEM</th>
                            <th class="center-align">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataPenerimaan as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item['nama_pendaftar']; ?></td>
                            <td><?php echo substr($item['nem'], 0, 2); ?></td>
                            <td class="center-align">
                                <a href="pendaftar_penerimaan.php?id=<?php echo $item['id']; ?>"><i class="material-icons blue-text">list</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php
    } ?>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>