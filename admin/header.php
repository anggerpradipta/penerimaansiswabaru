<?php 
session_start();
if ($_SESSION['status'] != 'login') {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../asset/css/materialize.min.css" rel="stylesheet" />
    <link href="../asset/css/dashboard_style.css" rel="stylesheet" />
    <link href="../asset/css/custom.css" rel="stylesheet" />
    <title>Dashboard Aplikasi PSB</title>
    <style>
        .side-nav{
            width : 250px !important;
        }
    </style>
</head>

<body>
    <div id="container">

        <div>

            <ul id="slide-out" class="side-nav fixed show-on-large-only blue-gradient">
                <li>
                    <div class="user-view">
                        <a href="#!user"><i class="material-icons medium white-text">account_circle</i></a>
                        <a href="#!name"><span class="black-text name"><?php echo $_SESSION['username']; ?></span></a>
                    </div>
                </li>
                <li class="divider"></li>
                <li><a href="dashboard.php"><i class="material-icons left">home</i>Home</a></li>
				<li><a href="kecamatan_index.php"><i class="material-icons left">assignment_turned_in</i>Data Kecamatan</a></li>
				<li><a href="sekolah_index.php"><i class="material-icons left">school</i>Data Sekolah</a></li>
                <li><a href="pendaftar_index.php"><i class="material-icons left">assignment_ind</i>Data Pendaftar</a></li>
                <li><a href="laporan_index.php"><i class="material-icons left">assignment</i>Laporan</a></li>
            </ul>
        </div>
        <nav class="nav-container grey lighten-4">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo black-text">PENERIMAAN SISWA BARU</a>
                <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons black-text">menu</i></a>
                <ul class="right">
                    <li><a href="logout.php" class="black-text"><i class="material-icons left">power_settings_new</i> <span class="hide-on-med-and-down">Logout</span></a></li>
                </ul>
            </div>
        </nav>
        <div id="content"> 