<?php
session_start();
$_SESSION['Logged'] = false;
header("Location: http://localhost:8021/xampp/Tarvit.pl/index.php");

?>