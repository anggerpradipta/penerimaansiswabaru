<?php
    require_once "../config/koneksi.php";
    if(isset($_POST['submit'])){
        $nama_kecamatan = htmlentities($_POST['nama_kecamatan']);
        $koneksi = new Koneksi();
        $db = $koneksi->ambilKoneksi();
        $statement = $db->prepare("UPDATE kecamatan SET nama_kecamatan=:nama_kecamatan WHERE id=".htmlentities($_POST['id']));  
        $statement->bindParam(":nama_kecamatan", $nama_kecamatan, PDO::PARAM_STR);
        $statement->execute();
        $koneksi->tutupKoneksi();
        header("location: kecamatan_index.php");
    }

?>