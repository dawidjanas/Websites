<?php
include("connection.php");
session_start();

if(isset($_POST['LoginButton']))
{
	$email = $_POST['LoginEmail'];
	$password = $_POST['LoginPassword'];
	
	$query = mysqli_query($conn, "SELECT password FROM users WHERE email = '$email'");
	$password_check = mysqli_fetch_row($query);
	
	
	if(md5($password) == $password_check[0])
	{
		$query2 = mysqli_query($conn, "SELECT username FROM users WHERE email = '$email'");
		$username = mysqli_fetch_row($query2);
		
		$_SESSION['loggedInToGieldadomow.pl'] = true;
		$_SESSION['username'] = $username[0];
		header("Location: http://localhost:8021/xampp/Gieldadomow.pl/index.php");
	}
	else
	{
		$_SESSION['loggedInToGieldadomow.pl'] = false;
	}
}


?>