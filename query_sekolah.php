<?php
    include 'config/koneksi.php';

    if (isset($_POST['id_kec'])) {
        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $query = $db->prepare('SELECT id, nama_sekolah FROM sekolah_asal WHERE id_kecamatan='.$db->quote($_POST['id_kec']));
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        if ($data > 0) {
            echo '<option value="" disabled selected>Pilih Sekolah</option>';
            foreach ($data as $item) {
                echo "<option value='".$item->id."'>".$item->nama_sekolah.'</option>';
            }
        } else {
            header('location: ./');
        }
    }
