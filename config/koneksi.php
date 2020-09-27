<?php

class Koneksi
{
    private $server = 'mysql:host=localhost;dbname=psb_db';
    private $user = 'root';
    private $pass = '';

    private $opsi = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    protected $db;

    public function ambilKoneksi()
    {
        try {
            $this->db = new PDO($this->server, $this->user, $this->pass, $this->opsi);

            return $this->db;
        } catch (PDOException $e) {
            echo 'Terjadi masalah saat menghubungkan ke database : '.$e->getMessage();
        }
    }

    public function tutupKoneksi()
    {
        $this->db = null;
    }
}
