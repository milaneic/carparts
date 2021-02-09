<?php 

include 'php/dbConfig.php';
if(isset($_POST['submit'])){
	
	$ime=$_POST['name'];
	$prezime=$_POST['lastname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$telefon=$_POST['phone'];
	$adresa=$_POST['adresa'];
	//$id=uniqid(rand(),true); za pravljenje varchar lozinke
	
	
	
	$provera="SELECT * FROM users WHERE username='".$username."'";
	
	$usernameFound=$db->query($provera);
	
	if(mysqli_num_rows($usernameFound)>0){
		
	}
	else{
		
		$hashedPwd=password_hash($password, PASSWORD_DEFAULT);
		echo $ime;
		echo $prezime;
		echo $email;
		echo $username;
		echo $hashedPwd;
		echo $telefon;
		echo $adresa;
		$sql="INSERT INTO users (id,ime,prezime,email,username,password,telefon,adresa,role) VALUES('null','".$ime."','".$prezime."','".$email."','".$username."','".$hashedPwd."','".$telefon."','".$adresa."','2')";
		if($db->query($sql)===TRUE){
			header('Location: index.php?success');
		}else{
			
			echo "Erro:".$sql."<br>".$db->error;
		}
		
		
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/singup.css">
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
<a class="nav-link" href="index.html">Pocetna<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="delovi.html">Delovi</a>
</li>
<li class="nav-item">
<a class="nav-link" href="o-nama.html">O nama</a>
</li>
<li class="nav-item">
<a class="nav-link" href="kontakt.html">Kontakt</a>
</li>
</ul>
<ul class="navbar-nav right">
<li class="nav-item">
<span></span>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-user"></i></a>
</li>

<li class="nav-item">
<a class="nav-link" href=""><i class="fas fa-shopping-cart"><span class="badge" style="color:red;">0</span></i></a>
</li>
</div>
</nav>

<!-- Login Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<h1>Login</h1>
<form id="logForm">
<label>Email:</label><br>
<input type="email" name="email" class="form-control" required=""><br>
<label>Password:</label><br>
<input type="password" name="password" class="form-control" required=""><br>
<input type="submit" name="submit" value="Login" class="btn-info form-control" id="prijavi"><br>
<p>Nemate jos nalog?  <a href="singup.html" class="btn-info">Prijavite se</a></p>


</form>

</div>
</div>
</div>

</div>
<h1 class="text-center">Prijava novog korisnika</h1>
<div class="okvir">	
<form method="POST" action="">
<div class="row">
<div class="col-md-4">
<label>Ime:</label>
</div>
<div class="col-md-8">
<input type="text" name="name" required="" placeholder="Unesite vase ime..." class="form-control">
</div>
</div>
<div class="row">
<div class="col-md-4">
<label>Prezime:</label>
</div>
<div class="col-md-8">
<input type="text" name="lastname" required="" placeholder="Unesite vase prezime..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Email:</label>
</div>
<div class="col-md-8">
<input type="email" name="email" required="" placeholder="Unesite vas Email..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Korisnicko ime:</label>
</div>
<div class="col-md-8">
<input type="text" name="username" required="" placeholder="Unesite vase korisnicko ime..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Lozinka:</label>
</div>
<div class="col-md-8">
<input type="password" name="password" required="" placeholder="Unesite vasu lozinku..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Broj telefona:</label>
</div>
<div class="col-md-8">
<input type="phone" name="phone" required="" placeholder="Unesite vas broj telefona..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Adresa:</label>
</div>
<div class="col-md-8">
<input type="text" name="adresa" required="" placeholder="Unesite vasu adresu..." class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-12">
<input type="submit" name="submit" class="form-control btn-danger marginT"  value="Prijavi se">
</div>
</div>
</form>
</div>
<!-- Footer -->
<footer>
<div class="row okvirFooter-a">
<div class="col-md-4"> <!-- 1 -->
<ul >
<li class="nav-item">
<a class="nav-link" href="index.php">Pocetna<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="delovi.php">Delovi</a>
</li>
<li class="nav-item">
<a class="nav-link" href="o-nama.html">O nama</a>
</li>
<li class="nav-item">
<a class="nav-link" href="kontakt.html">Kontakt</a>
</li>
</ul>
</div>

<div class="col-md-4"> <!-- 2 -->
<ul >
<li class="nav-item">
<a class="nav-link" href="index.html">Pocetna<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="delovi.html">Delovi</a>
</li>
<li class="nav-item">
<a class="nav-link" href="o-nama.html">O nama</a>
</li>
<li class="nav-item">
<a class="nav-link" href="kontakt.html">Kontakt</a>
</li>
</ul>
</div>

<div class="col-md-4"> <!-- 3 -->
<ul class="infos">
<li><span><b>Lokacija:</b> Ugrinovci bb 11200 Beograd</span></li>
<li><span><b>Telefon:</b> +381 11 452 248<br><b>Mobilni:</b> +381 64 970 90 42,<br>+381 64 970 90 43	</span></li>
<li><span><b>Mail:</b> info@autodelovi.rs</span></li>
<li><span><b>Radno vreme:</b><br>	
<b>Ponedeljak-Petak:</b> 7:00-20:00 <br>
<b>Subota </b> 7:00-15:00 <br>
<b>Nedelja:</b> Ne radimo</span></li>
</ul>
</div>
</div>
<div class="coryright">
<center><span id="godina">&copy</span></center>
</div>	
</footer>


<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>