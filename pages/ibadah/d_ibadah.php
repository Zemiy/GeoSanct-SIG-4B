<?php
include '../../database/koneksi.php';
$kd_tempat = $_POST['kd-tempat'];


$stmt = $conn->prepare("DELETE FROM bagian WHERE kd_tempat = ?");
$stmt->bind_param("s", $kd_tempat); 

if ($stmt->execute()) {
    session_start();
    $_SESSION['delete_success'] = 'Data berhasil dihapus';
    header("Location: ibadah.php");
    exit();
} else {
    session_start();
    $_SESSION['delete_error'] = "Data gagal dihapus: " . $stmt->error;
    header("Location: ibadah.php");
    exit();
}


$stmt->close();
?>
