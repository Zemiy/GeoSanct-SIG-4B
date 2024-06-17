<?php
session_start();
include '../../database/koneksi.php';

$kd_tempat = $_POST['kd-tempat'];
$nama_tempat = $_POST['nama-tempat'];
$jenis_tempat = $_POST['jenis-tempat'];
$alamat_tempat = $_POST['alamat-tempat'];
$kd_kelurahan = $_POST['kd-kelurahan'];
$kapasitas_tempat = $_POST['kapasitas-tempat'];

$stmt = $conn->prepare("UPDATE `ibadah` SET `nama` = ?, `jenis` = ?, `alamat` = ?, `kd_kelurahan` = ?, `kapasitas` = ? WHERE `kd_tempat` = ?");
$stmt->bind_param("ssssis", $nama_tempat, $jenis_tempat, $alamat_tempat, $kd_kelurahan, $kapasitas_tempat, $kd_tempat);

if ($stmt->execute()) {
    $_SESSION['update_success'] = 'Data berhasil diupdate';
    $stmt->close();
    header("Location: ibadah.php");
    exit();
} else {
    $_SESSION['update_error'] = "Data gagal diupdate " . $stmt->error;
    $stmt->close();
    header("Location: ibadah.php");
    exit();
}
?>
