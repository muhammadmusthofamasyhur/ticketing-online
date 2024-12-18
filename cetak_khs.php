<?php
include 'koneksi.php';
// memanggil library FPDF
require('fpdf/fpdf.php');

$id = $_GET['id'];

$mhs = mysqli_query($con, "SELECT nama, nim FROM mahasiswa WHERE id = $id LIMIT 1");
$data = mysqli_fetch_array($mhs);
$nama = $data['nama'];
$nim = $data['nim'];
// while ($row = mysqli_fetch_array($khs)) {
//     $nama = $row['nama'];
//     $nim = $row['nim'];
// }

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'KARTU HASIL STUDI', 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'INFORMATIKA', 1, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(190, 7, "NIM: $nim", 0, 1, 'L');
$pdf->Cell(190, 7, "NAMA MAHASISWA: $nama", 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'KODE', 1, 0);
$pdf->Cell(60, 6, 'MATA KULIAH', 1, 0);
$pdf->Cell(20, 6, 'SKS', 1, 0, 'C');
$pdf->Cell(25, 6, 'SEMESTER', 1, 0);
$pdf->Cell(50, 6, 'NILAI', 1, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(10, 6, '', 0, 1);
$khs = mysqli_query($con, "SELECT khs.*, mata_kuliah.nama AS nama_mk, mata_kuliah.sks, mata_kuliah.sem, mahasiswa.nama AS nama_mhs, mata_kuliah.kode  FROM `khs` INNER JOIN `mahasiswa` ON khs.id_mhs = mahasiswa.id INNER JOIN `mata_kuliah` ON khs.id_matkul = mata_kuliah.id WHERE id_mhs = $id");
while ($row = mysqli_fetch_array($khs)) {
    $pdf->Cell(20, 6, $row['kode'], 1, 0);
    $pdf->Cell(60, 6, $row['nama_mk'], 1, 0);
    $pdf->Cell(20, 6, $row['sks'], 1, 0);
    $pdf->Cell(25, 6, $row['sem'], 1, 0);
    $pdf->Cell(50, 6, $row['nilai'], 1, 0);
    $pdf->Cell(10, 6, '', 0, 1);
}

// Go to 1.5 cm from bottom
$pdf->SetY(118);
// Select Arial italic 8
$pdf->SetFont('Arial', 'I', 8);
// Print centered page number
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');
$pdf->Output();