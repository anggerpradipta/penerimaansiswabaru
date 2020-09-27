<?php
    require_once 'koneksi.php';

    class AutoNumber
    {
        public function kode($id, $tabel, $prefik)
        {
            $koneksi = new Koneksi();
            $db = $koneksi->ambilKoneksi();
            $query = $db->prepare('SELECT '.$id.' AS max_id FROM '.$tabel.' ORDER BY '.$id.' DESC');
            $query->execute();
            $data = $query->fetch();
            $idMaks = (int) substr($data['max_id'], 3);

            $angka = $idMaks + 1;
            $nol = '';

            switch (strlen($angka)) {
                case 1:
                    $nol = '000';
                    break;
                case 2:
                    $nol = '00';
                    break;
                case 3:
                    $nol = '0';
                    break;
                case 4:
                    $nol = '';
                    break;
                default:
                    break;
            }

            $kode = $prefik.$nol.$angka;

            return $kode;
        }
    }
