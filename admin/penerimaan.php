<?php
    require_once '../config/koneksi.php';

    if (isset($_GET['penerimaan']) && isset($_GET['no_pendaftar'])) {
        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $statement = $db->prepare('INSERT INTO penerimaan(no_pendaftar, status) VALUES (:noPendaftar, :status)');
        $statement->bindParam(':noPendaftar', $_GET['no_pendaftar'], PDO::PARAM_STR);
        $statement->bindParam(':status', $_GET['penerimaan'], PDO::PARAM_INT);
        $statement->execute();
        $koneksi->tutupKoneksi();

        session_start();
        $_SESSION['noDaftar'] = $noDaftar;

        header('location: pendaftar_index.php');
    }
