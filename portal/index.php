<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Pocetna<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delovi.php">Delovi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="o-nama.php">O nama</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="kontakt.php">Kontakt</a>
				</li>
			</ul>
			<ul class="navbar-nav right">

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
					<a class="nav-link" href=""><i class="fas fa-shopping-cart"><span class="badge" style="color:red;">0</span></i></a>
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

	</div>
	<div class="okvir">
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h1 class="display-3">Dobro dosli na nasu stranicu!</h1>
			<p class="lead">AutoDelovi je firma koja je osnovana 2000. godine sa sedistem u Beogradu. Svoje poslovanje uspesno vodi vec punih 20 godina uz pomoc svojih zadovoljnih kupaca.</p>
			<hr class="my-4">
			<p>Vise o nasoj firmi mozete pogledati na linku ispod.</p>
			<p class="lead">
				<a class="btn btn-outline-primary" style="font-size: 18px" href="o-nama.php" role="button">Saznaj vise</a>
			</p>
		</div>

		<!-- Carouserl -->
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="img/c1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img/c2.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img/c3.jpg" alt="Third slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img/c5.jpeg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<!-- Cards -->
		<div class="row cards">

			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="img/headlights.jfif" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Svetlosna grupa</h4>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Xenon farovi</li>
							<li class="list-group-item">Farovi</li>
							<li class="list-group-item">Sijalice H1-H7</li>
							<li class="list-group-item">Žmigavci</li>
							<li class="list-group-item">Konektori</li>
						</ul>
						<a href="delovi.php" class="btn btn-outline-primary">Pogledaj više</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="img/motor.jpg" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Motorna grupa</h4>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Kocioni diskovi</li>
							<li class="list-group-item">Kocione plocice</li>
							<li class="list-group-item">Kociono ulje</li>
							<li class="list-group-item">Kociona kljesta</li>
							<li class="list-group-item">Kocioni cilindri</li>
						</ul>
						<a href="delovi.php" class="btn btn-outline-primary">Pogledaj više</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
					<img class="card-img-top" src="img/brakes.jfif" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Kociona grupa</h4>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Xenon farovi</li>
							<li class="list-group-item">Farovi</li>
							<li class="list-group-item">Sijalice H1-H7</li>
							<li class="list-group-item">Zmigavci</li>
							<li class="list-group-item">Konektori</li>
						</ul>
						<a href="delovi.php" class="btn btn-outline-primary">Pogledaj više</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="mt-5"></div>
	<?php
	include 'php/footer.php';
	?>


	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>