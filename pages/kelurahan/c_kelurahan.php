<?php
include '../../database/koneksi.php';

$kd_kelurahan = $_POST['kd-kelurahan'];
$nama_kelurahan = $_POST['nama-kelurahan'];
$jumlah_tempat = $_POST['jumlah-tempat'];


$stmt = $conn->prepare("INSERT INTO `kelurahan` (`kd_kelurahan`, `nama_kelurahan`, `jumlah_tempat``) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $kd_kelurahan,$nama_kelurahan,$jumlah_tempat);

if ($stmt->execute()) {
    session_start();
    $_SESSION['create_success'] = 'Data berhasil diinput';
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
} else {
    session_start();
    $_SESSION['create_error'] = "Data gagal diinput: " . $stmt->error;
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
}
?>
