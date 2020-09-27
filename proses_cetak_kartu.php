<?php

session_start();
// memanggil library FPDF
require 'config/fpdf/fpdf.php';
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Times', 'B', 16);
// mencetak string

$pdf->Cell(190, 7, 'PENDAFTARAN SISWA BARU', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(190, 7, 'SMA NEGERI 1 BANTUL', 0, 1, 'C');
$pdf->SetFont('Times', 'I', 10);
$pdf->Cell(190, 7, 'Jl K.H Abdul Wakhid Hasyim Palbapang Bantul Yogyakarta 55713 Telp. 0274 367 547', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(190, 0, '_________________________________________________________________________________________', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(190, 7, '', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(190, 0, 'Kartu Pendaftaran', 0, 1, 'C');

$pdf->Cell(190, 5, '', 0, 1, 'C');

$pdf->SetFont('Times', '', 12);
$pdf->Cell(40, 10, 'Nomor Pendaftaran', 0, 'L');
$pdf->Cell(100, 10, ': '.$_SESSION['data']['no_daftar'], 0, 'L');
$pdf->Ln();

$pdf->Cell(40, 10, 'Nama Lengkap', 0, 'L');
$pdf->Cell(100, 10, ': '.$_SESSION['data']['nama_pendaftar'], 0, 'L');
$pdf->Ln();

$pdf->Cell(40, 10, 'Jenis Kelamin', 0, 'L');
$pdf->Cell(100, 10, ': '.$_SESSION['data']['jenis_kelamin'], 0, 'L');
$pdf->Ln();

$pdf->Cell(40, 10, 'Sekolah Asal', 0, 'L');
$pdf->Cell(100, 10, ': '.$_SESSION['data']['nama_sekolah'], 0, 'L');
$pdf->Ln();

$pdf->Cell(40, 10, 'NEM', 0, 'L');
$pdf->Cell(100, 10, ': '.substr($_SESSION['data']['nem'], 0, 2), 0, 'L');

$pdf->Output();
