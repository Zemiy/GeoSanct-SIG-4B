<?php
include '../../database/koneksi.php';
$kd_kelurahan = $_POST['kd-kelurahan'];

$stmt = $conn->prepare("DELETE FROM bagian WHERE kd_kelurahan = ?");
$stmt->bind_param("s", $kd_kelurahan); 

if ($stmt->execute()) {
    session_start();
    $_SESSION['delete_success'] = 'Data berhasil dihapus';
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
} else {
    session_start();
    $_SESSION['delete_error'] = "Data gagal dihapus " . $stmt->error;
    $stmt->close();
    header("Location: kelurahan.php");
    exit();
}



?>
