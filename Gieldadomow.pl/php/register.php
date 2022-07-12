<?php
session_start();
require_once("connection.php");

$user_id = uniqid(random_int(1000, 9999));

if(isset($_POST['RegisterButton']))
{
	$username = $_POST['RegisterUsername'];
	$email = $_POST['RegisterEmail'];
	$password = $_POST['RegisterPassword'];
	$md5_password = md5($password);
	
	$query = "INSERT INTO users (id, username, email, password) VALUES ('$user_id', '$username', '$email', '$md5_password')";
	$query_run = mysqli_query($conn, $query);
	
	if($query_run)
	{
		header("Location: http://localhost:8021/xampp/Gieldadomow.pl/index.php");
	}
}
?>
