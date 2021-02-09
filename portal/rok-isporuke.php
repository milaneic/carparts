<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/o-nama.css">
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<title>Kontakt</title>
</head>
<body>
	<!-- Navigacija -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.html">AutoDelovi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor03">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Pocetna</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delovi.php">Delovi</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="o-nama.php">O nama<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="kontakt.php">Kontakt</a>
				</li>
			</ul>
			<ul class="navbar-nav right">

				<?php if(isset($_SESSION['userId'])){
					echo '<form action="php/logout.php">
					<input type="submit" value="Odjavi se" name="submit-logout" class="btn btn-outline-primary">
					</form>';
				}else {
					echo '
					<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-user"></i></a>
					</li>';
					
				} ?>
				<li class="nav-item">
					<a class="nav-link" href="viewcart.php"><i class="fas fa-shopping-cart"><span class="badge" style="color:red;">0</span></i></a>
				</li>
			</ul>	
		</div>
	</nav>

	<!-- Login Modal -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<h1>Login</h1>
				<form id="logForm" method="POST" action="php/login.php">
					<label>Email:</label><br>
					<input type="text" name="email" class="form-control" required=""><br>
					<label>Password:</label><br>
					<input type="password" name="password" class="form-control" required=""><br>
					<input type="submit" name="submit" value="Login" class="btn-info form-control" id="prijavi"><br>
					<p>Nemate jos nalog?  <a href="singup.php" class="btn btn-info">Prijavite se</a></p>
				</form>
			</div>
		</div>
	</div>

	<div class="okvir">
		<div class="row">
			<div class="col-md-12 isporuka">	
				<h1 class="mt-3 mb-3">Rok isporuke</h1>
				<p>Poštovani korisnici,</p>

				<p>U zavisnosti od raspoložive količine određenog artikla i mogućnosti njegovog nabavljanja, a u skladu sa našom poslovnom politikom, očekivani rok isporuke proizvoda iz naše ponude je do 72h (do 3 radna dana). Artikle za kojima potražnja nije toliko učestala, kao i one kod kojih je uvozni proces komplikovaniji, na svojoj adresi možete očekivati sa nešto dužim rokom isporuke.</p><br>

				<p>U zavisnosti od raspoložive količine određenog artikla i mogućnosti njegovog nabavljanja, a u skladu sa našom poslovnom politikom, očekivani rok isporuke proizvoda iz naše ponude je do 72h (do 3 radna dana). Artikle za kojima potražnja nije toliko učestala, kao i one kod kojih je uvozni proces komplikovaniji, na svojoj adresi možete očekivati sa nešto dužim rokom isporuke.</p><br>

				<p><strong>SVI PROIZVODI IZ ONLINE PONUDE DOSTUPNI SU ZA PORUČIVANJE, A AKO PAK NEKI NIJE, MOŽEMO VAM PONUDITI ZAMENSKI SLIČNIH KARAKTERISTIKA!</strong></p><br>

				<p>Ponuda i cene na našem sajtu ažurni su na dnevnom nivou. Na Vama je samo da odaberete, poručite i sačekate kurira za par dana na svojim vratima. Mogućnost greške, nažalost, ne možemo isključiti. Ali ukoliko do iste dođe, najkasnije u roku od 24h bićete kontaktirani od strane naših komercijalista i dobiti informaciju o nastaloj grešci. U suprotnom, poručene proizvode dobićete na svojoj adresi saglasno rokovima isporuke naznačenim uz njih.</p>				
			</div>
		</div>
	</div>
	<?php
	include 'php/footer.php';
	?>
</body>
</html>