<?php

require_once '../config/koneksi.php';

if (isset($_POST['login'])) {
    session_start();

    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = 'SELECT * FROM admin WHERE username=:username AND password=:password';
    $statement = $db->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['status'] = 'login';
        header('location:dashboard.php');
    } else {
        $_SESSION['user_pwd_wrong'] = 1;
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    $db = $koneksi->tutupKoneksi();

}
