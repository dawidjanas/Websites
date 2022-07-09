<?php
session_start();
$_SESSION['loggedInToGieldadomow.pl'] = false;
header("Location: http://localhost:8021/xampp/Gieldadomow.pl/index.php");

?>