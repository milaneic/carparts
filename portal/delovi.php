<?php

session_start();

include "php/dbConfig.php";
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/delovi.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<title>AutoDelovi | Pronadjite sve sto vam treba za vas auto</title>
</head>

<body>
	<!-- Navigacija -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">AutoDelovi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor03">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="index.php">Pocetna<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
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
				<li class="nav-item">
					<span></span>
				</li>
				<?php if (isset($_SESSION['userId'])) {
					echo '<form action="php/logout.php">
					<input type="submit" value="Odjavi se" name="submit-logout" class="btn btn-outline-primary">
					</form>';
				} else {
					echo '<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-user"></i></a>
					</li>
					';
				}
				?>

				<li class="nav-item">
					<a class="nav-link" href="viewCart.php"><i class="fas fa-shopping-cart"><span class="badge" style="color:red;">0</span></i></a>
				</li>
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
	<!-- SearchBar -->
	<div class="row marginT">
		<div class="col-md-3 ">
			<h3>
				<center> Pretrazite zeljeni deo:</center>
			</h3>
		</div>
		<div class="col-md-7"><input type="text" id="unesiNaziv" class="form-control" placeholder="Unesite naziv trazenog dela..."></div>
		<div class="col-md-2">
			<center><button id="traziPoNazivu" class="btn btn-danger">Trazi</button></center>
		</div>
	</div>
	<!-- Main page with products -->
	<div class="row">
		<!-- Filters for products -->
		<div class="col-md-2 menu">
			<div class="price marginT">
				<h3>Cena:</h3>
				<input id="min_price" style="display: none" name="minimalna_cena"></input>
				<input id="max_price" style="display: none" name="maximalna_cena"></input>
				<input type="text" readonly="" id="price_show" class="form-control marginT">
				<div id="price_range" class="marginT"></div>


			</div>
			<div class="car_part_group marginT ">
				<h3>Grupe delova:</h3>
				<?php
				$query = "SELECT DISTINCT naziv,id FROM kategorija WHERE naziv IS NOT NULL ORDER BY id ASC";
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchall();
				foreach ($result as $row) {
				?>
					<div class="checkbox_cars">
						<label><input type="checkbox" class="checkbox_cars kategorija" value="<?php echo $row['id']; ?>"> <?php echo $row['naziv'] ?> </label>
					</div>
				<?php
				}
				?>
			</div>

			<div class="car_marks marginT marginFilterR">
				<h3>Grupe delova:</h3>
				<?php
				$query = "SELECT DISTINCT id,marka FROM vozilo WHERE marka IS NOT NULL ORDER BY id ASC";
				$statement = $connect->prepare($query);
				$statement->execute();
				$result = $statement->fetchall();
				foreach ($result as $row) {
				?>
					<div class="checkbox_cars ">
						<label><input type="checkbox" class="checkbox_cars marka" value="<?php echo $row['id']; ?>"> <?php echo $row['marka'] ?> </label>
					</div>
				<?php
				}
				?>
			</div>

		</div>
		<!-- Products -->
		<div class="col-md-9">
			<div class="row filter_data products">

			</div>
		</div>
	</div>

	<?php
	include 'php/footer.php';
	?>

	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
		$(document).ready(function() {

			filter_data();

			function filter_data() {
				$('.filter_data').html('<div id="loading" style="" ></div>');
				var action = 'catch_products';
				var minimum_price = $('#min_price').val();
				var maximum_price = $('#max_price').val();
				var marka = get_filter('marka');
				var kategorija = get_filter('kategorija');
				var naziv = get_naziv('traziPoNazivu');
				$.ajax({
					url: "php/catch_products.php",
					method: "POST",
					data: {
						action: action,
						naziv: naziv,
						minimum_price: minimum_price,
						maximum_price: maximum_price,
						marka: marka,
						kategorija: kategorija
					},
					success: function(data) {
						$('.products').html(data);
					}
				});
			}

			function get_naziv() {
				var ime = $('#unesiNaziv').val().toUpperCase();
				if (ime != '') {
					return ime;
				}


			}

			$('#traziPoNazivu').click(function() {
				filter_data();
			})

			function get_filter(class_name) {
				var filter = [];
				$('.' + class_name + ':checked').each(function() {
					filter.push($(this).val());
				});
				return filter;
			}

			$('.checkbox_cars').click(function() {
				filter_data();
			});

			$('#price_range').slider({
				range: true,
				min: 1000,
				max: 185000,
				values: [1000, 185000],
				step: 5000,
				slide: function(event, ui) {
					$('#price_show').val(ui.values[0] + ' - ' + ui.values[1] + " dinara");
					$('#min_price').val(ui.values[0]);
					$('#max_price').val(ui.values[1]);
					filter_data();
				}
			});

		});
	</script>
</body>

</html>