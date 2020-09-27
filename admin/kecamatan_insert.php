<?php
    require_once "../config/koneksi.php";
    if(isset($_POST['submit'])){
        $nama_kecamatan = htmlentities($_POST['nama_kecamatan']);
        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $statement = $db->prepare("INSERT INTO kecamatan(nama_kecamatan) VALUES (:nama_kecamatan)");  
        $statement->bindParam(":nama_kecamatan", $nama_kecamatan, PDO::PARAM_STR);
        $statement->execute();
        $koneksi->tutupKoneksi();
        header("location: kecamatan_index.php");
    }

?>