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
			<div class="col-md-12 opis">	
				<h1 class="mt-4 mb-5">O nama</h1>
				<p>Kompanija AutoDelovi je osnovana 2000. godine i lider je na tržištu Srbije u oblasti distribucije auto-delova, akumulatora, guma, dodatne opreme i kozmetike.</p>

				<p>	 Sve što svakodnevno radimo usmereno je ka uspostavljanju i održavanju dugoročnih odnosa sa našim partnerima i krajnjim potrošačima nudeći im originalne auto-delove i pružajući kvalitetnu uslugu, koja je rezultat znanja i stručnosti koje poseduju naši zaposleni, a što je sadržano u viziji našeg poslovanja.
				</p>

				<p>		AutoDelovi posluje u svim većim gradovima širom Srbije kroz više od 25 maloprodajnih objekata. Distribuciju vršimo iz centralnog magacina u Leštanima koji po svojim karakteristikama predstavlja jedinstven sistem skladištenja i manipulacije auto-delovima, izgrađen po savremenim tehnološkim rešenjima.
				</p>

				<h3>MISIJA</h3>

				<p>	Uspostavljamo i održavamo dugoročne odnose sa našim partnerima i krajnjim potrošačima nudeći im originalne auto-delove i pružajući vrhunsku uslugu. Širok asortiman i vrhunska usluga čine nas prepoznatljivim na tržištu.</p>

				<p>Nastojeći da budemo prvi izbor našim klijentima posvećeno se bavimo distribucijom auto-delova, akumulatora, guma, dodatne opreme i kozmetike čime zadovoljavamo specifične potrebe i očekivanja naših korisnika i pomažemo im da pronađu najbolje rešenje kako bi ostvarili svoje snove o mobilnosti.</p>

				<p>Vodimo računa o svojim klijentima, potrošačima, dobavljačima i saradnicima.</p>

				<h3>VIZIJA</h3>

				<p>Da naše proizvode i uslugu koriste oni koji teže izvrsnosti.  Da budemo kompanija koja ima značajan uticaj na trendove, razvoj i dalja kretanja na tržištu u segmentu distribucije auto-delova. Težimo da budemo utemeljivači novih ideja i standarda. “Sve za vaše vozilo, sve na jednom mestu”.</p>

				<h3>VREDNOSTI</h3>

				<p>Inovativnost, posvećenost, poverenje, kvalitet i sigurnost. One su naš temelj, usmeravaju nas u svakodnevnom radu, služe kao putokazi u donošenju odluka. Naša odgovornost je da ih primenjujemo svakog dana. Naše vrednosti nas čine jakim kao pojedinca i kao grupu.</p>


			</div>
		</div>
	</div>
	<?php
	include 'php/footer.php';
	?>
</body>
</html>