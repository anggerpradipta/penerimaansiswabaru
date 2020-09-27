<?php 
    require_once 'config/koneksi.php';
    require_once 'header.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare('SELECT pendaftar.nama_pendaftar, sekolah_asal.nama_sekolah, penerimaan.status FROM penerimaan, pendaftar, sekolah_asal WHERE pendaftar.no_daftar = penerimaan.no_pendaftar AND pendaftar.id_sekolah = sekolah_asal.id');
    $query->execute();
    $data = $query->fetchAll();
?>
    <div class="row padding-horizontal">
        <div class="col s12 padding-bottom">
            <h5 class="center-align padding-bottom">Pendaftar</h5>
            <?php if (count($data) == 0) { ?>
                <p class="center-align red-text">Tidak ada data untuk ditampilkan</p>
            <?php } else {
                  $no = 1; 
            ?>
                <table class="bordered">
                    <thead >
                        <tr>
                            <th>No</th>
                            <th>Nama Pendaftar</th>
                            <th>Sekolah Asal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $item): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item['nama_pendaftar']; ?></td>
                            <td><?php echo $item['nama_sekolah']; ?></td>
                            <td><?php
                                if ($item['status'] == 1) {
                                    echo 'Diterima';
                                } else {
                                    echo 'Gagal';
                                } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            <?php } ?>
        </div>
       
    </div>
<?php require_once 'footer.php'; ?>