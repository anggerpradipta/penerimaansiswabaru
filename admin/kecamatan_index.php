<?php
    require_once '../config/koneksi.php';
    require_once 'header.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare('SELECT * FROM kecamatan');
    $query->execute();
    $data = $query->fetchAll();
?>
    <div class="row">
        <div class="fixed-action-btn">
            <a href="kecamatan_form_tambah.php" class="btn-floating btn-large green tooltipped" data-position="left" data-tooltip="Tambah Data">
                <i class="material-icons large">add</i>
            </a>
        </div>
            <div class="col s12">
            <h5 class="blue-text center-align">Data Kecamatan</h5>
            <?php if (count($data) == 0) {
    ?>
                <p class="center-align red-text">Tidak ada data untuk ditampilkan</p>
            <?php
} else {
        $no = 1; ?>
                <table class="bordered">
                    <thead class="grey lighten-4">
                        <tr>
                            <th>No</th>
                            <th>Nama Kecamatan</th>
                            <th class="center-align">Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $item): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item['nama_kecamatan']; ?></td>
                            <td class="center-align">
                                <a href="kecamatan_form_edit.php?id=<?php echo $item['id']; ?>"><i class="material-icons green-text">create</i></a>
                                <a href="kecamatan_hapus.php?id=<?php echo $item['id']; ?>" class="hapus"><i class="material-icons red-text">delete</i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            <?php
    } ?>
            </div>
    </div>
<?php
    require_once 'footer.php';
?>