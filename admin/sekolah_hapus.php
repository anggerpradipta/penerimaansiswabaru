<?php

require_once '../config/koneksi.php';
$id = $_GET['id'];
$koneksi = new Koneksi();
$db = $koneksi->ambilKoneksi();
$statement = $db->prepare('DELETE FROM sekolah_asal WHERE id='.$id);
$statement->execute();
$koneksi->tutupKoneksi();
header('location: sekolah_index.php');
