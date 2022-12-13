<?php
session_start();
include("connection.php");
include("login.php");

if(isset($_POST['SearchOfferButton']))
{
	$house_type = $_POST['HouseTypeInput'];
	$house_location = $_POST['HouseLocation'];
	
	header("Location: http://localhost:8021/xampp/Tarvit.pl/searchoffer.php?house_type='$house_type'&&location='$house_location'");
	
}


?>
