<?php
    require_once "../config/koneksi.php";
    if(isset($_POST['submit'])){
        $id_kecamatan = htmlentities($_POST['id_kecamatan']);
        $nama_sekolah = htmlentities($_POST['nama_sekolah']);
        $alamat_sekolah = htmlentities($_POST['alamat_sekolah']);
        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $statement = $db->prepare("INSERT INTO sekolah_asal(id_kecamatan, nama_sekolah, alamat_sekolah) VALUES (:id_kecamatan, :nama_sekolah, :alamat_sekolah)");  
        $statement->bindParam(":id_kecamatan", $id_kecamatan, PDO::PARAM_INT);
        $statement->bindParam(":nama_sekolah", $nama_sekolah, PDO::PARAM_STR);
        $statement->bindParam(":alamat_sekolah", $alamat_sekolah, PDO::PARAM_STR);
        $statement->execute();
        $koneksi->tutupKoneksi();
        header("location: sekolah_index.php");
    }

?>