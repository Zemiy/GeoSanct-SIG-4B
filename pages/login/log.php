<?php
session_start(); 
include '../../database/koneksi.php';

$user = $_POST['logUsername'];
$pass = $_POST['logPassword'];

$result = mysqli_query($conn, "SELECT * FROM login where username='$user' and password='$pass'");
$row = mysqli_fetch_array($result);

if ($row) {
	$_SESSION['logUsername'] = $row['username']; 
	$_SESSION['level'] = $row['level']; 
	header("Location: ../dashboard/dashboard.html"); 
} else {
	$_SESSION['login_error'] = "Username atau Password yang anda masukan salah.";
	header("Location:login.php");
}

?>