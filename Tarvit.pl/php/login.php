<?php
session_start();
require_once("connection.php");

if(isset($_POST['LoginButton']))
{
	$email = $_POST['LoginEmail'];
	$password = $_POST['LoginPassword'];
	
	$query = $conn->prepare("SELECT password FROM users WHERE email = '$email'");
	$query->execute();
	
	
	$result = $query->get_result();
	$password_check = $result->fetch_row();
	
	if(md5($password) == $password_check[0])
	{
		$query2 = $conn->prepare("SELECT username FROM users WHERE email = '$email'");
		$query2->execute();
		$result2 = $query2->get_result();
		$username = $result2->fetch_row();
		
		$query3 = $conn->prepare("SELECT id FROM users WHERE email = '$email'");
		$query3->execute();
		$result3 = $query3->get_result();
		$user_id = $result3->fetch_row();
		
		$_SESSION['Logged'] = true;
		$_SESSION['LoginUsername'] = $username[0];
		$_SESSION['UserID'] = $user_id[0];
		$_SESSION['LoginError'] = false;
		header("Location: http://localhost:8021/xampp/Tarvit.pl/index.php");
	}
	else
	{
		$_SESSION['Logged'] = false;
		$_SESSION['LoginError'] = true;
		header("Location: http://localhost:8021/xampp/Tarvit.pl/index.php");
	}
}


?>