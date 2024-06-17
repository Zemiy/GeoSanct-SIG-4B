<?php
include '../../database/koneksi.php';
$kd_tempat = $_POST['kd-tempat'];


$stmt = $conn->prepare("DELETE FROM ibadah WHERE kd_tempat = ?");
$stmt->bind_param("s", $kd_tempat); 

if ($stmt->execute()) {
    session_start();
    $_SESSION['delete_success'] = 'Data berhasil dihapus';
    $stmt->close();
    header("Location: ibadah.php");
    exit();
} else {
    session_start();
    $_SESSION['delete_error'] = "Data gagal dihapus " . $stmt->error;
    $stmt->close();
    header("Location: ibadah.php");
    exit();
}



?>
