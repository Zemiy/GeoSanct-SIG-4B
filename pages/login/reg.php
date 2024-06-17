<?php
include '../database/koneksi.php';

$user = $_POST['regUsername'];
$level = $_POST['regLevel'];
$pass = $_POST['regPassword'];

$proses = mysqli_query($conn, "INSERT INTO `login` (`username`,`password`,`level`)
VALUES ('$user','$pass','$level')");

if ($proses) {
    session_start();
    $_SESSION['register_status'] = 'success';
    header("Location: login.php");
    exit();
} else {
    echo "Proses Simpan Gagal";
}

?>