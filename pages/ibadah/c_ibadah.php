<?php
include '../../database/koneksi.php';

$kd_tempat = $_POST['kd-tempat'];
$nama_tempat = $_POST['nama-tempat'];
$jenis_tempat = $_POST['jenis-tempat'];
$alamat_tempat = $_POST['alamat-tempat'];
$kd_kelurahan = $_POST['kd-kelurahan'];
$kapasitas_tempat = $_POST['kapasitas-tempat'];

$stmt = $conn->prepare("INSERT INTO `ibadah` (`kd_tempat`, `nama`, `jenis`, `alamat`, `kd_kelurahan`, `kapasitas`) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $kd_tempat, $nama_tempat, $jenis_tempat, $alamat_tempat, $kd_kelurahan, $kapasitas_tempat);

if ($stmt->execute()) {
    session_start();
    $_SESSION['create_success'] = 'Data berhasil diinput';
    header("Location: ibadah.php");
    exit();
} else {
    session_start();
    $_SESSION['create_error'] = "Data gagal diinput: " . $stmt->error;
    header("Location: ibadah.php");
    exit();
}


$stmt->close();
?>
