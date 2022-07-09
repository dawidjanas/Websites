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
	include("php/autocomplete.php");
	?>
	
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
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
		
	
		<div class="card bg-dark text-white" id="PromotedPosts">
			<div class="card-header" style="text-align:center">Dodaj swoje ogłoszenie</div>
			<div class="card-body">
				<form name="AddOffer" action="php/addingoffer.php" method="POST">
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferTitle">Tytuł ogłoszenia</label>
						<input type="text" name="OfferTitle" id="OfferTitle" class="form-control" maxlength="150" required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferPicture">Zdjęcie</label>
						<input type="file" name="OfferPicture" id="OfferPicture" class="form-control"required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferPrice">Cena</label>
						<input type="text" name="OfferPrice" id="OfferPrice" class="form-control" maxlength="10" required />
						<label class="form-label" for="OfferPrice">zł</label>
					</div>
								
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferLocalisation">Miejscowość</label>
						<input type="text" name="OfferLocalisation" id="OfferLocalisation" class="form-control" maxlength="40" required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferState">Stan wykończenia domu</label>
						<select class="form-select" id="OfferState" name="OfferState">
							<option selected>Wybierz...</option>
							<option value="Stan deweloperski">Stan deweloperski</option>
							<option value="Dom wykończony">Dom wykończony</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferHouseType">Rodzaj domu</label>
						<select class="form-select" id="OfferHouseType" name="OfferHouseType">
							<option selected>Rodzaj domu...</option>
							<option value="Dom wolnostojący">Dom wolnostojący</option>
							<option value="Dom w zabudowie bliźniaczej">Dom w zabudowie bliźniaczej</option>
							<option value="Dom szeregowy">Dom szeregowy</option>
							<option value="Dom atrialny">Dom atrialny</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferSellerType">Typ sprzedającego</label>
						<select class="form-select" id="OfferSellerType" name="OfferSellerType">
							<option selected>Wybierz...</option>
							<option value="Osoba prywatna">Osoba prywatna</option>
							<option value="Agencja nieruchomości">Agencja nieruchomości</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferHouseSize">Wielkość domu</label>
						<input type="text" name="OfferHouseSize" id="OfferHouseSize" class="form-control" maxlength="3" required />
						<label class="form-label" for="OfferHouseSize">m<sup>2</sup>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferPropertySize">Wielkość działki</label>
						<input type="text" name="OfferPropertySize" id="OfferPropertySize" class="form-control" maxlength="4" required />
						<label class="form-label" for="OfferHouseSize">m<sup>2</sup>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferRooms">Liczba pokoi</label>
						<input type="text" name="OfferRooms" id="OfferRooms" class="form-control" maxlength="2" required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferMaterial">Meteriał domu</label>
						<select class="form-select" id="OfferMaterial" name="OfferMaterial">
							<option selected>Wybierz...</option>
							<option value="Cegła">Cegła</option>
							<option value="Drewno">Drewno</option>
							<option value="Pustak">Pustak</option>
							<option value="Beton">Beton</option>
							<option value="Keramzyt">Keramzyt</option>
							<option value="Wielka płyta">Wielka płyta</option>
						</select>
					</div>
					
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferHeatingType">Rodzaj paliwa od ogrzewania</label>
						<select class="form-select" id="OfferHeatingType" name="OfferHeatingType">
							<option selected>Wybierz...</option>
							<option value="Ogrzewanie gazowe">Ogrzewanie gazowe</option>
							<option value="Ogrzewanie elektryczne">Ogrzewanie elektryczne</option>
							<option value="Ogrzewanie piecem">Ogrzewanie piecem</option>
							<option value="Ogrzewanie kominkiem">Ogrzewanie kominkiem</option>
							<option value="Odnawialne źródła energii">Odnawialne źródła energii</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferHeatingInstall">Rodzaj instalacji grzewczej</label>
						<select class="form-select" id="OfferHeatingInstall" name="OfferHeatingInstall">
							<option selected>Wybierz...</option>
							<option value="Ogrzewanie podłogowe">Ogrzewanie podłogowe</option>
							<option value="Ogrzewanie ścienne">Ogrzewanie ścienne</option>
							<option value="Ogrzewanie grzejnikowe">Ogrzewanie grzejnikowe</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferFloors">Ilość pięter</label>
						<input type="text" name="OfferFloors" id="OfferFloors" class="form-control" maxlength="2" required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferRoofType">Rodaj dachu</label>
						<select class="form-select" id="OfferRoofType" name="OfferRoofType">
							<option selected>Wybierz...</option>
							<option value="Dwuspadowy">Dwuspadowy</option>
							<option value="Czterospadowy_kopertowy">Czterospadowy kopertowy</option>
							<option value="Czterospadowy_namiotowy">Czterospadowy namiotowy</option>
							<option value="Mansardowy">Mansardowy</option>
							<option value="Pulpitowy">Pulpitowy</option>
							<option value="Plaski">Płaski</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferRoofMaterial">Pokrycie dachu</label>
						<select class="form-select" id="OfferRoofMaterial" name="OfferRoofMaterial">
							<option selected>Wybierz...</option>
							<option value="Dachówka ceramiczna">Dachówka ceramiczna</option>
							<option value="Dachówka cementowa">Dachówka cementowa</option>
							<option value="Blacho-dachówka">Blacho-dachówka</option>
							<option value="Dachówka bitumiczna">Dachówka bitumiczna</option>
							<option value="Masa dachowa">Masa dachowa</option>
							<option value="Gont drewniany">Gont drewniany</option>
							<option value="Strzecha">Strzecha</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferFence">Ogrodzenie</label>
						<select class="form-select" id="OfferFence" name="OfferFence">
							<option selected>Wybierz...</option>
							<option value="Płot drewniany">Płot drewniany</option>
							<option value="Ogrodzenie metalowe">Ogrodzenie metalowe</option>
							<option value="Ogrodzenie murowane">Ogrodzenie murowane</option>
							<option value="Ogrodzenie kompozytowe">Ogrodzenie kompozytowe</option>
							<option value="Ogrodzenie betonowe">Ogrodzenie betonowe</option>
							<option value="Żywopłot">Żywopłot</option>
							<option value="Brak ogrodzenia">Brak ogrodzenia</option>
						</select>
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferMedia">Media</label>
						<input type="text" name="OfferMedia" id="OfferMedia" class="form-control" maxlength="150" required />
					</div>
					
					<div class="form-outline mb-4">
						<label class="form-label" for="OfferDescription">Opis ogłoszenia</label>
						<input type="text" name="OfferDescription" id="OfferDescription" class="form-control" maxlength="3000" required />
					</div>
					
					<div class="text-center">
						<input class="btn btn-primary btn-block col-6  mx-auto" type="submit" name="AddOfferButton" value="Dodaj ogłoszenie"/>
					</div>
				</form>
			</div>
		</div>
		
		
		<footer class="footer mt-auto py-1 text-center text-lg-start bg-dark text-white">
			<div class="text-center p-4">Copyright © 2022:
				<a class="text-reset fw-bold" href="https://github.com/dawidjanas/Websites">Dawid Janas</a>
			</div>
		</footer>
	</body>
</html>