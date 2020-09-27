<?php
    require_once 'config/koneksi.php';
    require_once 'config/AutoNumber.php';

    if (isset($_POST['submit_daftar'])) {
        $namaLengkap = htmlentities($_POST['nama_lengkap']);
        $jk = htmlentities($_POST['jk']);
        $alamat = htmlentities($_POST['alamat']);
        $tempatLahir = htmlentities($_POST['tempat_lahir']);
        $tanggalLahir = htmlentities($_POST['tanggal_lahir']);
        $idSekolah = htmlentities($_POST['sekolah']);
        $agama = htmlentities($_POST['agama']);
        $namaOrtu = htmlentities($_POST['nama_ortu']);
        $agama = htmlentities($_POST['agama']);
        $nem = htmlentities($_POST['nem']);

        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $kode = new AutoNumber();
        $noDaftar = $kode->kode('no_daftar', 'pendaftar', 'P');
        $statement = $db->prepare('INSERT INTO pendaftar(no_daftar, nama_pendaftar, id_sekolah, jenis_kelamin, alamat, tanggal_lahir, tempat_lahir, agama, nama_ortu, nem) VALUES (:noDaftar, :namaPendaftar, :idSekolah, :jk, :alamat, :tglLahir, :tmptLahir, :agama, :namaOrtu, :nem)');
        $statement->bindParam(':noDaftar', $noDaftar, PDO::PARAM_STR);
        $statement->bindParam(':namaPendaftar', $namaLengkap, PDO::PARAM_STR);
        $statement->bindParam(':idSekolah', $idSekolah, PDO::PARAM_INT);
        $statement->bindParam(':jk', $jk, PDO::PARAM_STR);
        $statement->bindParam(':alamat', $alamat, PDO::PARAM_STR);
        $statement->bindParam(':tglLahir', $tanggalLahir, PDO::PARAM_STR);
        $statement->bindParam(':tmptLahir', $tempatLahir, PDO::PARAM_STR);
        $statement->bindParam(':agama', $agama, PDO::PARAM_STR);
        $statement->bindParam(':namaOrtu', $namaOrtu, PDO::PARAM_STR);
        $statement->bindParam(':nem', $nem, PDO::PARAM_INT);
        $statement->execute();
        $koneksi->tutupKoneksi();

        session_start();
        $_SESSION['noDaftar'] = $noDaftar;

        header('location: pendaftaran_hasil.php');
    }
