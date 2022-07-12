<?php 
session_start(); 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<title>Giełda domów</title>
		
	</head>
	<body class="d-flex flex-column min-vh-100">
	<?php
	include("php/connection.php");
	include("php/login.php");
	?>
	
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand"href="index.php">
				<img src="images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="logo" style="margin-left: 15px;"> 
				Giełda Domów
			</a>
				<div class="btn-group dropstart">
					<button type="button" class="btn btn-outline-info" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:15px;">
					<?php echo $_SESSION['LoginUsername']; ?>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Gieldadomow.pl/addoffer.php">Dodaj ogłoszenie</a></li>
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Gieldadomow.pl/useroffers.php">Twoje ogłoszenia</a></li>
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Gieldadomow.pl/userfavorite.php">Obserwowane ogłoszenia</a></li>
						<li><hr class="dropdown-divider"></li>
						<li>
							<form name="SignOut" action="php/signout.php" method="POST">
								<button class="dropdown-item" type="submit">Wyloguj się</button>
							</form>
						</li>
					</ul>
				</div>
				
		</nav>
		<?php
			$offer_id = $_REQUEST['id'];
			$query = mysqli_query($conn, "SELECT * FROM offers WHERE id = '$offer_id'");
			$row = mysqli_fetch_array($query);
			$query2 = mysqli_query($conn, "SELECT users.username FROM users INNER JOIN offers ON users.id = '".$row['user_id']."'");
			$row2 = mysqli_fetch_array($query2);
		?>
		
		<div class="card">
			<div class="card-body">
			<div class="row">
				<h4 class="card-title"><?php echo $row['title']; ?> </h4>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<img <?php echo 'src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"'; ?> class="img-fluid"/>
				</div>
				<div class="col-sm-4">
					<h5>Informacje szczegółowe</h5>
					test
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<h5>Opis ogłoszenia</h5>
					<?php echo $row['description']; ?>
				</div>
			</div>
			<div class="row">
				<h5>Kontakt</h5>
				<?php echo $row2['username']; ?>
			</div>
			</div>
		</div>
			
		
		
		
		
		<footer class="footer mt-auto py-1 text-center text-lg-start bg-dark text-white">
			<div class="text-center p-4">Copyright © 2022:
				<a class="text-reset fw-bold" href="https://github.com/dawidjanas/Websites">Dawid Janas</a>
			</div>
		</footer>
	</body>
</html>