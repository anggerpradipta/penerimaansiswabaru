<?php

require '../config/fpdf/fpdf.php'; // load fpdf class
require '../config/koneksi.php'; // load koneksi database
$koneksi = new Koneksi();
$db = $koneksi->ambilKoneksi();

class PDF extends FPDF {

    // memberikan warna pada table
    function FancyTable($header, $data) {
        // warna, lebar dan font bold
        $this->SetFillColor(169, 169, 169);
        $this->SetTextColor(30, 30, 30);
        $this->SetDrawColor(89, 89, 89);
        $this->SetLineWidth(.2);
        $this->SetFont('Arial', 'B');
        // Header
        $w = array(20, 90, 80);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // warna line
        $this->SetFillColor(245, 245, 245);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Parsing Data
        $fill = false;
        $no = 1;
        foreach ($data as $row) {
            $this->Cell($w[0], 7, $no++, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 7, $row['nama_sekolah'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 7, $row['jml_sekolah'], 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // tutup line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$pdf = new PDF();
// tentukan header kolom

$header = array('#', 'Nama Sekolah', 'Jumlah Pendaftar');
// Data loading
$sql = "SELECT sekolah_asal.nama_sekolah, COUNT(sekolah_asal.nama_sekolah) AS jml_sekolah FROM penerimaan INNER JOIN pendaftar ON penerimaan.no_pendaftar = pendaftar.no_daftar LEFT JOIN sekolah_asal ON pendaftar.id_sekolah = sekolah_asal.id WHERE penerimaan.no_pendaftar = pendaftar.no_daftar AND pendaftar.id_sekolah = sekolah_asal.id  GROUP BY sekolah_asal.nama_sekolah DESC";

$data = array();
$result = $db->query($sql);
$data = $result->fetchAll();
$jml = count($data);

$pdf->AddPage();

$pdf->SetFont('Times', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'LAPORAN JUMLAH PENDAFTAR PER SEKOLAH', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(190, 7, 'SMA Negeri 1 Kota Madiun', 0, 1, 'C');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 7, 'Jl. Mastrip No.19, Mojorejo, Kec. Taman, Kota Madiun, Jawa Timur', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(190, 7, '__________________________________________________________________________________________', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);

$pdf->FancyTable($header, $data);
$pdf->Output();
?>