<?php
session_start();
include("connection.php");
include("login.php");

if(isset($_POST['AddOfferButton']))
{
	
	$offer_id = uniqid(random_int(1,99999));
	$title = $_POST['OfferTitle'];
	$b = getimagesize($_FILES['OfferPicture']['tmp_name']);
	$price = $_POST['OfferPrice'];
	$seller_type = $_POST['OfferSellerType'];
	$localisation = $_POST['OfferLocalisation'];
	$house_size = $_POST['OfferHouseSize'];
	$property_size = $_POST['OfferPropertySize'];
	$house_type = $_POST['OfferHouseType'];
	$rooms = $_POST['OfferRooms'];
	$material = $_POST['OfferMaterial'];
	$heating_type = $_POST['OfferHeatingType'];
	$heating_install_type = $_POST['OfferHeatingInstall'];
	$media = $_POST['OfferMedia'];
	$floors = $_POST['OfferFloors'];
	$roof_type = $_POST['OfferRoofType'];
	$roof_material = $_POST['OfferRoofMaterial'];
	$fence = $_POST['OfferFence'];
	$state = $_POST['OfferState'];
	$description = $_POST['OfferDescription'];
	$user_id = $_SESSION['UserID'];
	$created_on = date("Y-m-d H:i:s");
	$verified = "no";
	$promoted = "no";
	$status = "active";
	
	if($b !== false)
	{
		$file = $_FILES['OfferPicture']['tmp_name'];
		$picture = addslashes(file_get_contents($file));
		$query = "INSERT INTO offers (id, title, picture, price, seller_type, localisation, house_size, property_size, type, rooms, material, heating_type, heating_install_type, media, floors, roof_type, roof_material, fence, state, description, user_id, added_time, verified, promoted, status) VALUES ('$offer_id', '$title', '$picture', '$price', '$seller_type', '$localisation', '$house_size', '$property_size', '$house_type', '$rooms', '$material', '$heating_type', '$heating_install_type', '$media', '$floors', '$roof_type', '$roof_material', '$fence', '$state', '$description', '$user_id', '$created_on', '$verified', '$promoted', '$status')";
		$query_run = mysqli_query($conn, $query);
	
		if($query_run)
		{
			header("Location: http://localhost:8021/xampp/Tarvit.pl/index.php");
		}
	}
	else
	{
		header("Location: http://localhost:8021/xampp/Tarvit.pl/imagefail.php");
	}
}
?>