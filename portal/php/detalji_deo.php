<?php
session_start();
$id = $_GET['id'];
require_once 'dbConfig.php';

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>AutoDelovi | Pronadjite sve sto vam treba za vas auto</title>
</head>

<body>
    <!-- Navigacija -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">AutoDelovi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '1') { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../admin.php">Pregled delova<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pregled-korisnika.php">Pregled korisnika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pregled-porudzbina.php">Pregled porudzbina</a>
                    </li>

                <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Pocetna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../delovi.php">Delovi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../o-nama.php">O nama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kontakt.php">Kontakt</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav right">

                <?php if (isset($_SESSION['userId'])) {
                    echo '<form action="logout.php">
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
                <form id="logForm" method="POST" action="login.php">
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
    <div class="container">
        <h1>Detalji deo</h1>
        <?php
        $sql = "SELECT * FROM delovi WHERE id=" . $id;
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();

        $sql2 = "SELECT * FROM kategorija";
        $statement = $connect->prepare($sql2);
        $statement->execute();
        $result2 = $statement->fetchAll();

        $sql3 = "SELECT * FROM vozilo";
        $statement = $connect->prepare($sql3);
        $statement->execute();
        $result3 = $statement->fetchAll();
        ?>
        <div class="row">
            <div class="col-md-6">
                <img class="img" src="<?= $result['slika'] ?>" style="height: 100%; width: 100%;">
            </div>
            <div class="col-md-6">
                <h4><?= $result['naziv'] ?></h4>
                <p style="font-size: 24px;">Proizvodjac: <?= $result['proizvodjac'] ?></p>
                <p style="font-size: 24px;">Opis: <?= $result['opis'] ?></p>
                <p style="font-size: 24px;">Cena sa PDV-om: <?= $result['cenaPDV'] ?> dinara</p>
                <?php foreach ($result2 as $r2) {
                    if ($r2['id'] == $result['idKategorija']) { ?>
                        <p style="font-size: 24px;">Kategorija dela: <?= $r2['naziv'] ?></p>
                <?php  }
                } ?>
                <?php foreach ($result3 as $r3) {
                    if ($r3['id'] == $result['idMarka']) { ?>
                        <p style="font-size: 24px;">Marka vozila: <?= $r3['marka'] ?></p>
                <?php  }
                } ?>
                <a href="cartAction.php?action=addToCart&id=<?= $result['id'] ?>" class="btn btn-success">Dodaj u korpu</a>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom">
        <!-- Social -->
        <div class="social">
            <div class="row">
                <div class="col-md-8">
                    <p> Zapratite nas na nasim drustevenim mrezama!</p>
                </div>
                <div class="col-md-4">
                    <!--Facebook-->
                    <a class="fb-ic mr-3" role="button" href="http://facebook.com"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <!--Twitter-->
                    <a class="tw-ic mr-3" role="button" href="http://twitter.com"><i class="fab fa-2x fa-twitter"></i></a>
                    <!--Google +-->
                    <a class="gplus-ic mr-3" role="button" href="https://aboutme.google.com/u/0/?referer=gplus"><i class="fab fa-2x fa-google-plus-g"></i></a>
                    <!--Linkedin-->
                    <a class="li-ic mr-3" role="button" href="http://Linkedin.com"><i class="fab fa-2x fa-linkedin-in"></i></a>
                    <!--Instagram-->
                    <a class="ins-ic mr-3" role="button" href="http://instagram.com"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- 1 -->
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="uslovi-koriscenja.php">Uslovi koriscenja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rok-isporuke.php">Rok isporuke</a>
                    </li>

                </ul>
            </div>

            <div class="col-md-4">
                <!-- 2 -->
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Pocetna</a>
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
            </div>

            <div class="col-md-4">
                <!-- 3 -->
                <ul class="infos">
                    <li><span><b>Lokacija:</b> Ugrinovci bb 11200 Beograd</span></li>
                    <li><span><b>Telefon:</b> +381 11 452 248<br><b>Mobilni:</b> +381 64 970 90 42,<br>+381 64 970 90 43 </span></li>
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
    </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>