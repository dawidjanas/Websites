<?php 
session_start(); 
error_reporting(0);
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
			<a class="navbar-brand"href="index.html">
				<img src="images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="logo" style="margin-left: 15px;"> 
				Giełda Domów
			</a>
			<button type="button" <?php if(isset($_SESSION['loggedInToGieldadomow.pl']) && $_SESSION['loggedInToGieldadomow.pl'] == true) { ?> style="display:none;"<?php } ?>class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#LoginForm" style="margin-right: 15px;">Konto</button>
		</nav>
		
		<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="LoginFormLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<ul class="nav nav-pills nav-justified mb-3" id="LoginFormPill" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Logowanie</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="true">Rejestracja</a>
							</li>
						</ul>
						
						
						<div class="tab-content">
							<!-- LOGOWANIE -->
							<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">									
								<form name="LogForm" action="php/login.php" method="POST" required>
									<div class="form-outline mb-4">
										<label class="form-label" for="LoginName">E-mail</label>
										<input type="email" name="LoginEmail" id="LoginEmail" class="form-control" required/>
									</div>
									
									<div class="form-outline mb-4">
										<label class="form-label" for="LoginPassword">Hasło</label>
										<input type="password" name="LoginPassword" id="LoginPassword" class="form-control" required/>									
									</div>
									
									<div class="row mb-4">
										<div class="col-md-6 d-flex justify-content-center">
											<div class="form-check mb-3 mb-md-0">
												<input class="form-check-input" type="checkbox" value="" id="RememberMeCheck" unchecked">
												<label class="form-check-label" for="RememberMeCheck">Zapamiętaj mnie</label>													
											</div>
										</div>					
										<div class="col-md-6 d-flex justify-content-center">
											<a href="#" class="link-danger">Przypomnienie hasła(TODO)</a>
										</div>										
									</div>
									<div class="text-center">
										<input type="submit" class="btn btn-primary btn-block col-6 mx-auto" name="LoginButton" value="Zaloguj się"/>
									</div>
								</form>
							</div>
							
							<!-- REJESTRACJA -->
							<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
								<form name="RegisterForm" action="php/register.php" method="POST" required>
									<div class="form-outline mb-4">
										<label class="form-label" for="RegisterUsername">Nazwa użytkownika</label>
										<input type="text" name="RegisterUsername" id="RegisterUsername" class="form-control" required/>
									</div>
									 
									<div class="form-outline mb-4">
										<label class="form-label" for="RegisterEmail">E-mail</label>
										<input type="email" name="RegisterEmail" id="RegisterEmail"class="form-control" required/>
									</div>
									
									<div class="form-outline mb-4">
										<label class="form-label" for="RegisterPassword">Hasło</label>
										<input type="password" name="RegisterPassword" id="RegisterPassword" class="form-control"required/>
										
									</div>
									
									<div class="form-outline mb-4">
										<label class="form-label" for="RegisterRepeatPasswordPassword">Powtórz hasło</label>
										<input type="password" name="RegisterRepeatPassword" id="RegisterRepeatPassword" class="form-control" required/>
									</div>
									
									<div class="form-check d-flex justify-content-center mb-4">
										<input class="form-check-input me-2" type="checkbox" value="" id="RegisterTermsCheck" unchecked aria-describedby="RegisterTermsCheck" required/>
										<label class="form-check-label" for="RegisterTermsCheck"> Akceptuję <a href="#" class="link-danger"> regulamin (TODO) </a></label>								
									</div>
									
									
									<div class="text-center">
										<input class="btn btn-primary btn-block col-6  mx-auto" type="submit" name="RegisterButton" value="Zarejestruj się"/>
									</div>
									
									
								</form>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="card bg-dark text-white" id="CardSearch">
			<div class="card-header" style="text-align:center">Znajdź dom swoich marzeń</div>	
			<div class="card-body">
				<div class="input-group mb-3" style="float:left;">
					<select class="custom-select" id="HouseTypeInput">
						<option selected>Rodzaj domu...</option>
						<option value="Wolno">Dom wolnostojący</option>
						<option value="Blizniak">Dom w zabudowie bliźniaczej</option>
						<option value="Szereg">Dom szeregowy</option>
						<option value="Atrialny">Dom atrialny</option>
					</select>
					<!-- GEO API dodać-->
					<input type="text" class="form-control" placeholder="Miejscowość" aria-label="HouseLocationInput" style="float:left;">
					<!-- Zmienić z input text na dropdown od 5km-500km -->
					<input type="text" class="form-control" placeholder="+0km" aria-label="HouseLocationRange" style="float:left;">
				</div>
					<button type="button" class="btn btn-success btn-lg">Szukaj</button>
			</div>
		</div>
		
		<div class="card bg-dark text-white" id="PromotedPosts">
			<div class="card-header" style="text-align:center">Promowane posty</div>
			<div class="card-body">
				
			</div>
		</div>
		
		<div class="card bg-dark text-white" id="NewestPosts">
			<div class="card-header" style="text-align:center">Najnowsze posty</div>
			<div class="card-body">
			
			</div>
		</div>
		
		<footer class="footer mt-auto py-1 text-center text-lg-start bg-dark text-white">
			<div class="text-center p-4">Copyright © 2022:
				<a class="text-reset fw-bold" href="https://github.com/dawidjanas/Websites">Dawid Janas</a>
			</div>
		</footer>
	</body>
</html>