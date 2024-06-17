<?php
include '../../database/koneksi.php';

$user = $_POST['regUsername'];
$level = $_POST['regLevel'];
$pass = $_POST['regPassword'];

$stmt = $conn->prepare("INSERT INTO `login` (`username`, `password`, `level`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $pass, $level);

if ($stmt->execute()) {
    session_start();
    $_SESSION['register_status'] = 'success';
    header("Location: login.php");
    exit();
} else {
    echo "Proses Simpan Gagal: " . $stmt->error;
}

$stmt->close();
?>
