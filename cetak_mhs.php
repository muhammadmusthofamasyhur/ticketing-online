<?php
include 'koneksi.php';
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'PROGRAM STUDI TEKNIK INFORMATIKA', 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR MAHASISWA', 1, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'NIM', 1, 0);
$pdf->Cell(50, 6, 'NAMA MAHASISWA', 1, 0, 'C');
$pdf->Cell(25, 6, 'J KEL', 1, 0);
$pdf->Cell(50, 6, 'ALAMAT', 1, 0);
$pdf->Cell(30, 6, 'TANGGAL LHR', 1, 1);
$pdf->SetFont('Arial', '', 10);

$mahasiswa = mysqli_query($con, "select * from mahasiswa");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(20, 6, $row['nim'], 1, 0);
    $pdf->Cell(50, 6, $row['nama'], 1, 0);
    $pdf->Cell(25, 6, $row['jenis_kelamin'], 1, 0);
    $pdf->Cell(50, 6, $row['alamat'], 1, 0);
    $pdf->Cell(30, 6, $row['tgl_lahir'], 1, 1);
}

// Go to 1.5 cm from bottom
$pdf->SetY(118);
// Select Arial italic 8
$pdf->SetFont('Arial', 'I', 8);
// Print centered page number
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');
$pdf->Output();