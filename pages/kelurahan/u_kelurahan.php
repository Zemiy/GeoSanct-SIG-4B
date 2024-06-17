<?php
session_start();
include '../../database/koneksi.php';

$kd_kelurahan = $_POST['kd-kelurahan'];
$nama_kelurahan = $_POST['nama-kelurahan'];
$jumlah_tempat = $_POST['jumlah-tempat'];

$stmt = $conn->prepare("UPDATE `kelurahan` SET `nama_kelurahan` = ?, `jumlah_tempat_ibadah` = ? WHERE `kd_kelurahan` = ?");
$stmt->bind_param("sis", $nama_kelurahan, $jumlah_tempat,$kd_kelurahan);

if ($stmt->execute()) {
    $_SESSION['update_success'] = 'Data berhasil diupdate';
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
} else {
    $_SESSION['update_error'] = "Data gagal diupdate " . $stmt->error;
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
}
?>
