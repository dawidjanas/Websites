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
		<title>Tarvit</title>
		
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
				Tarvit
			</a>
				<div class="btn-group dropstart">
					<button type="button" class="btn btn-outline-info" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:15px;">
					<?php echo $_SESSION['LoginUsername']; ?>
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Tarvit.pl/addoffer.php">Dodaj ogłoszenie</a></li>
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Tarvit.pl/useroffers.php">Twoje ogłoszenia</a></li>
						<li><a class="dropdown-item" href="http://localhost:8021/xampp/Tarvit.pl/userfavorite.php">Obserwowane ogłoszenia</a></li>
						<li><hr class="dropdown-divider"></li>
						<li>
							<form name="SignOut" action="php/signout.php" method="POST">
								<button class="dropdown-item" type="submit">Wyloguj się</button>
							</form>
						</li>
					</ul>
				</div>
				
		</nav>
		<ul class="nav nav-pills nav-justified mb-3" id="UserOffers" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="active-tab" data-bs-toggle="pill" href="#ActiveUserOffersTab" role="tab" aria-controls="active" aria-selected="true">Aktywne oferty</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="pending-tab" data-bs-toggle="pill" href="#PendingUserOffersTab" role="tab" aria-controls="pending" aria-selected="true">Oczekujące</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="ended-tab" data-bs-toggle="pill" href="#EndedUserOffersTab" role="tab" aria-controls="ended" aria-selected="true">Zakończone</a>
			</li>
		</ul>
		
		<div class="tab-content" id="UserOffersContent">
			<div class="tab-pane fade show active" id="ActiveUserOffersTab" role="tabpanel" aria-labelledby="active-tab">
				<div class="card bg-dark text-white" id="NewestPosts">
					<div class="card-header" style="text-align:center"></div>
					<div class="card-body text-black">
							<?php 
								$query = $conn->prepare("SELECT * FROM offers WHERE user_id = '".$_SESSION['UserID']."'");
								$query->execute();
								
								$result = $query->get_result();
								while($row = $result->fetch_assoc())
								{
								
								if(isset($row['verified']) && isset($row['status']) && $row['verified'] == 'yes' && $row['status'] == 'active')
								{
									?>
								<div class="card" id="OfferPreview" name="OfferPreview">
								<a class="card-block stretched-link text-decoration-none" href="http://localhost:8021/xampp/Tarvit.pl/offer.php?id=<?php echo $row['id']; ?>">
									<div class="card-header">
										<ul class="list-group list-group-horizontal">
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['title']; ?></h5></li>
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['price']; ?> zł</h5></li>	
										</ul>
									</div>
									<div class="card-body">
										
										<img <?php echo 'src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"'; ?> class="img-fluid"/>
										
										
										<?php echo $row['localisation']; ?><br>
										<?php echo $row['description']; ?>
									</div>
								</a>
								</div>
								
								<?php }} ?>
						
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="PendingUserOffersTab" role="tabpanel" aria-labelledby="pending-tab">
				<div class="card bg-dark text-white" id="NewestPosts">
					<div class="card-header" style="text-align:center"></div>
					<div class="card-body text-black">
							<?php 
								$query = $conn->prepare("SELECT * FROM offers WHERE user_id = '".$_SESSION['UserID']."'");
								$query->execute();
								
								$result = $query->get_result();
								while($row = $result->fetch_assoc())
								{
								
								if(isset($row['verified']) && isset($row['status']) && $row['verified'] == 'no' && $row['status'] == 'active')
								{
									?>
								<div class="card" id="OfferPreview" name="OfferPreview">
								<a class="card-block stretched-link text-decoration-none" href="http://localhost:8021/xampp/Tarvit.pl/offer?id=<?php echo $row['id']; ?>">
									<div class="card-header">
										<ul class="list-group list-group-horizontal">
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['title']; ?></h5></li>
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['price']; ?> zł</h5></li>	
										</ul>
									</div>
									<div class="card-body">
										
										<img <?php echo 'src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"'; ?> class="img-fluid"/>
										
										
										<?php echo $row['localisation']; ?><br>
										<?php echo $row['description']; ?>
									</div>
								</a>
								</div>
								
								<?php }} ?>
						
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="EndedUserOffersTab" role="tabpanel" aria-labelledby="ended-tab">
				<div class="card bg-dark text-white" id="NewestPosts">
					<div class="card-header" style="text-align:center"></div>
					<div class="card-body text-black">
							<?php 
								$query = $conn->prepare("SELECT * FROM offers WHERE user_id = '".$_SESSION['UserID']."'");
								$query->execute();
								
								$result = $query->get_result();
								while($row = $result->fetch_assoc())
								{
								
								if(isset($row['verified']) && isset($row['status']) && $row['verified'] == 'yes' && $row['status'] == 'nonactive')
								{
									?>
								<div class="card" id="OfferPreview" name="OfferPreview">
								<a class="card-block stretched-link text-decoration-none" href="http://localhost:8021/xampp/Tarvit.pl/offer?id=<?php echo $row['id']; ?>">
									<div class="card-header">
										<ul class="list-group list-group-horizontal">
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['title']; ?></h5></li>
											<li class="list-group-item"><h5 class="mt-0"><?php echo $row['price']; ?> zł</h5></li>	
										</ul>
									</div>
									<div class="card-body">
										
										<img <?php echo 'src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"'; ?> class="img-fluid"/>
										
										
										<?php echo $row['localisation']; ?><br>
										<?php echo $row['description']; ?>
									</div>
								</a>
								</div>
								
								<?php }} ?>
						
					</div>
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