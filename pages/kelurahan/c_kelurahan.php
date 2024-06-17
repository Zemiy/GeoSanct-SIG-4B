<?php
include '../../database/koneksi.php';

$kd_kelurahan = $_POST['kd-kelurahan'];
$nama_kelurahan = $_POST['nama-kelurahan'];
$jumlah_tempat = $_POST['jumlah-tempat'];


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
