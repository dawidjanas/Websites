<?php
session_start();
include("connection.php");

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
		
		$query3 = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
		$user_id = mysqli_fetch_row($query3);
		
		$_SESSION['loggedInToGieldadomow.pl'] = true;
		$_SESSION['LoginUsername'] = $username[0];
		$_SESSION['UserID'] = $user_id[0];
		$_SESSION['LoginError'] = false;
		header("Location: http://localhost:8021/xampp/Gieldadomow.pl/index.php");
	}
	else
	{
		$_SESSION['loggedInToGieldadomow.pl'] = false;
		$_SESSION['LoginError'] = true;
		header("Location: http://localhost:8021/xampp/Gieldadomow.pl/index.php");
	}
}


?>