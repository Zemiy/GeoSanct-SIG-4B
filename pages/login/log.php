<?php
session_start();
include '../../database/koneksi.php';

$user = $_POST['logUsername'];
$pass = $_POST['logPassword'];


$stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass); 

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row) {
    $_SESSION['logUsername'] = $row['username'];
    $_SESSION['level'] = $row['level'];
	$stmt->close();
    header("Location: ../dashboard/dashboard.html");
    exit();
} else {
    $_SESSION['login_error'] = "Username atau Password yang anda masukan salah.";
	$stmt->close();
    header("Location:login.php");
    exit();
}



?>
