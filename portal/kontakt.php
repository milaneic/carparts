<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/kontakt.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<title>AutoDelovi | Pronadjite sve sto vam treba za vas auto</title>
</head>

<body>
	<!-- Navigacija -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="">AutoDelovi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor03">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="index.php">Pocetna</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delovi.php">Delovi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="o-nama.php">O nama</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="kontakt.php">Kontakt<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<ul class="navbar-nav right" style="align-items: baseline;">

				<?php if (isset($_SESSION['userId'])) {
					echo '<form action="php/logout.php">
					<input type="submit" value="Odjavi se" name="submit-logout" class="btn btn-outline-primary">
					</form>';
				} else {
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
					<p>Nemate jos nalog? <a href="singup.php" class="btn btn-info">Prijavite se</a></p>
				</form>
			</div>
		</div>
	</div>

	<div class="okvir">
		<h1>AutoDelovi - Kontakt</h1>
		<div class="row">
			<!-- Informacije -->
			<div class="col-md-4">
				<div class="border-informacije">
					<ul class="informacije">
						<li><span><b>Lokacija:</b> Ugrinovci bb 11200 Beograd</span></li>
						<li><span><b>Telefon:</b> +381 11 452 248<br><b>Mobilni:</b> +381 64 970 90 42,<br>+381 64 970 90 43 </span></li>
						<li><span><b>Mail:</b> info@autodelovi.rs</span></li>
						<li><span><b>Web:</b> <a href="index.html">www.autodelovi.rs</a></span></li>
						<li>
							<span>
								<b>Radno vreme:</b><br>
								<b>Ponedeljak-Petak:</b> 7:00-20:00 <br>
								<b>Subota </b> 7:00-15:00 <br>
								<b>Nedelja:</b> Ne radimo
							</span>
						</li>
					</ul>
				</div>
			</div>

			<!-- Mapa -->
			<div class="col-md-8">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90501.02784788865!2d20.131413313996735!3d44.85909607628095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a5ceabbd83665%3A0x48c13ae2ea083d98!2sUgrinovci%2C%20Serbia!5e0!3m2!1sen!2sde!4v1585506812429!5m2!1sen!2sde" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>


		<div class="row mt-5 mb-5">
			<div class="col-md-6">
				<form action="" method="POST">
					<fieldset>
						<legend>Ako imate neko pitanje ili komentar obratite nam se</legend>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Ime:</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesite vase ime">
							<small id="emailHelp" class="form-text text-muted">Mi nikad necemo deliti vase ime sa nekim drugim.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email adresa:</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesite vas email">
							<small id="emailHelp" class="form-text text-muted">Mi nikad necemo deliti vas email sa nekim drugim.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Naslov poruke:</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesite naslov poruke">
						</div>
						<div class="form-group">
							<label for="exampleTextarea">Vasa poruka:</label>
							<textarea class="form-control" id="exampleTextarea" rows="4" placeholder="Unesite sadrzaj vase poruke"></textarea>
						</div>


						<input type="reset" name="reset" class="btn btn-danger" value="Ponisti">
						<input type="submit" name="submit" class="btn btn-success" value="Posalji poruku">
					</fieldset>
				</form>
			</div>
			<div class="col-md-4" style="margin: auto auto; padding: 20px;">
				<img src="img/k1.jpg">
			</div>
		</div>
	</div>
	<?php
	include 'php/footer.php';
	?>

	<!-- Skripte -->
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>