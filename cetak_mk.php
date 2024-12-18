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
$pdf->Cell(190, 7, 'DAFTAR MATA KULIAH', 1, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'ID', 1, 0);
$pdf->Cell(20, 6, 'KODE', 1, 0);
$pdf->Cell(60, 6, 'NAMA MATA KULIAH', 1, 0, 'C');
$pdf->Cell(25, 6, 'SKS', 1, 0);
$pdf->Cell(50, 6, 'SEMESTER', 1, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(10, 6, '', 0, 1);
$matakuliah = mysqli_query($con, "select * from mata_kuliah");
while ($row = mysqli_fetch_array($matakuliah)) {
    $pdf->Cell(20, 6, $row['id'], 1, 0);
    $pdf->Cell(20, 6, $row['kode'], 1, 0);
    $pdf->Cell(60, 6, $row['nama'], 1, 0);
    $pdf->Cell(25, 6, $row['sks'], 1, 0);
    $pdf->Cell(50, 6, $row['sem'], 1, 0);
    $pdf->Cell(10, 6, '', 0, 1);
}

// Go to 1.5 cm from bottom
$pdf->SetY(118);
// Select Arial italic 8
$pdf->SetFont('Arial', 'I', 8);
// Print centered page number
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');
$pdf->Output();