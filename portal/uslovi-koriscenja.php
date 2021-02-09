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
				<h1 class="mt-3 mb-3">Opšta pravila</h1>

				<p>Korišćenjem bilo kog dela portala www.polovni-delovi.com i svih njegovih delova, smatraće se da automatski prihvatate sva aktuelna pravila korišćenja.</p>

				<p>Korisnici su dužni da redovno čitaju pravila korišćenja, te se smatra da su korisnici kontinuiranim korišćenjem portala www.polovni-delovi.com, ili bilo kog  njegovog dela, u svakom trenutku upoznati s aktuelnim pravilima korišćenja, te da su ih razumeli u celosti.</p>
				<p>
				Ni jedan deo portala www.polovni-delovi.com ne sme se koristiti u nezakonite svrhe, ni za promovisanje istih.</p>

				<p>Portal www.polovni-delovi.com sadržaj objavljuje u dobroj nameri. Sadržaj portala www.polovni-delovi.com koristite na vlastitu odgovornost i portal www.polovni-delovi.com se ne može smatrati odgovornim za bilo kakvu štetu nastalu korišćenjem.
				</p>
				<p>Zabranjeno je davati lažne informacije i oglase koji nisu u skladu sa zakonom ili uredjivačkom politikom portala www.polovni-delovi.com. Portal www.polovni-delovi.com ne može biti odgovoran za posledice takvih aktivnosti. Svaki korisnik je odgovoran za istinitost unesenog sadržaja na portalu polovni-delovi.com. Ukoliko smatrate da neki sadžaj nije tačan ili da je došlo do zloupotrebe sadržaja, možete koristiti formu koja se nalazi ispod svakog objavljenog sadržaja na portalu www.polovni-delovi.com, slučaj će biti odmah razmotren, a sporni sadržaj biće uklonjeni odmah po eventualnom ustanovljavanju istinitosti sadržaja žalbe.</p>

				<p>Portal www.polovni-delovi.com može u svakom trenutku odbiti postavljanje bilo kojih sadržaja na sajt ili izvršiti njegovo prilagođavanje shodno pravilima korišćenja portala, uređivačkoj politici portala www.polovni-delovi.com ili iz drugog razloga. Ovo se može vršiti bez prethodnog upozorenja i objašnjenja.</p>

				<h4>Autorska prava</h4>
				<p>Portal www.polovni-delovi.com polaže autorska prava na sve vlastite sadržaje. Neovlašćeno korišćenje bilo kog dela sajta smatra se kršenjem autorskih prava www.polovni-delovi.com i podložno je tužbi.</p>

				<p>Ukoliko smatrate da se na portalu  www.polovni-delovi.com nalazi sadržaj kojim smo povredili Vaša autorska prava, slučaj će biti odmah razmotren, a sporni sadržaj biće uklonjeni odmah po eventualnom ustanovljavanju istinitosti sadržaja žalbe.
				Žalbe pošaljite putem kontakt forme</p>

				<h4>Korisnici</h4>

				<p>Urednici sadržaja sajta zadržavaju pravo da odbiju pružanje usluga bilo kome u slučaju da smatraju da je došlo do kršenja nekih odredbi.</p>

				<p>Portal  www.polovni-delovi.com zadržava pravo privremenog suspendovanja ili potpunog i trajnog ukidanja pristupa Korisniku nekim ili svim pruženim uslugama u slučaju nepoštovanja nekog od navedenih stavova Opštih pravila, u cilju zaštite servisa i drugih korisnika.</p>

				<p>U slučaju kršenja Opštih pravila svu odgovornost za eventualne direktne ili indirektne štete snosi isključivo Korisnik.</p>

				<p></p>

				<p>Korisnik kome zbog nepoštovanja Opštih pravila bude ukinuto pružanje usluge, nema pravo na povraćaj novca, a u slučaju kršenja zakona će biti prijavljen nadležnom organu u skladu sa zakonskim obavezama.</p>

				<p>Sajt  www.polovni-delovi.com ima pravo da odbije pružanje usluga u slučajevima:</p>
				<ul>
					<li><p>ako postoji osnovana sumnja da su podaci o identitetu, odnosno pravnoj sposobnosti korisnika, ovlašćenju ili pravu na zastupanje, netačni ili neistiniti.
					</p></li>
					<li><p>ako postoji osnovana sumnja da je korisnik napravio više korisničkih naloga za sebe ili više lica sa ciljem kršenja Zakona o zaštiti potrošača po članu III NEPOŠTENA POSLOVNA PRAKSA ("Sl. glasnik RS", br. 62/2014 i 6/2016 - dr. zakon)</p></li>
					<li><p>ako postoji osnovana sumnja da korisnik oznakama, podacima ili oblikom, stvara zabunu kod potrošača u pogledu porekla, kvaliteta ili drugih svojstava robe koju prodaje.</p></li>
					<li><p>ako postoji osnovana sumnja da Korisnik zloupotrebljava ili ima nameru zloupotrebljavati neku od usluga koje pruza sajt  www.polovni-delovi.com ili ako omogućava trećoj osobi zloupotrebu tih usluga.</p></li>
					<li><p>Portal  www.polovni-delovi.com se obavezuje da će čuvati privatnost korisnika sajta, osim u slučaju teškog kršenja pravila portala  www.polovni-delovi.com ili nezakonitih aktivnosti korisnika.</p></li>
				</ul>

				<h4>Istinitost i tačnost informacija, upisi korisnika</h4>

				<p>Postavljanjem oglasa na portal www.polovni-delovi.com, korisnik potvrđuje tačnost informacija koje je uneo pri unosu oglasa.</p>

				<p>Portal www.polovni-delovi.com ni u kom pogledu ne odgovara  za tačnost i istinitost podataka na portalu www.polovni-delovi.com datih od strane posetilaca sajta.</p>

				<h4>Modifikovanje i promene pravila</h4>

				<p>Portal www.polovni-delovi.com zadržava pravo da bez najave povremeno promeni ili modifikuje pravila..</p>

				<p>Korišćenjem bilo kog sadržaja na portala www.polovni-delovi.com, smatra se da ste upoznati sa najnovijim pravilima.</p>
				<h4>
				Ograničenje odgovornosti</h4>

				<p>Ni pod kakvim okolnostima portal www.polovni-delovi.com neće biti odgovoran nijednom korisniku, u smislu njegovog pravilnog ili nepravilnog korišćenja ili oslanjanja na portal www.polovni-delovi.com.</p>

			</div>
		</div>
	</div>
	<?php
	include 'php/footer.php'; 
	?>
</body>
</html>