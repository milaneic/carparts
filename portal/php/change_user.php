<?php
session_start();
if ($_SESSION['role'] != '1') {
    header("Location:index.php?error=invalid");
}

require_once 'dbConfig.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=" .    $id;
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>AutoDelov | Admin panel</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="">AutoDelovi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">Pregled delova<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pregled-korisnika.php">Pregled korisnika</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pregled-porudzbina.php">Pregled porudzbina</a>
                        </li>
                    </ul>
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
    </header>
    <style>
        .container {
            max-width: 80%;
        }
    </style>
    <main>
        <div class="container">
            <H1 class="MT-5">Izmena korisnika</H1>
            <form method="POST" action="#" style="width: 40%; margin: 0 auto;">
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" value="<?= $result['ime'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" value="<?= $result['prezime'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?= $result['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefon">Telefon:</label>
                    <input type="text" name="telefon" value="<?= $result['telefon'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="adresa">Adresa:</label>
                    <input type="text" name="adresa" value="<?= $result['adresa'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Korisnik</option>
                    </select>
                </div>
                <br>
                <input type="submit" name="submit" value="Izmeni korisnika" class="btn btn-success">
            </form>
        </div>
    </main>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $i = $_POST['ime'];
    $p = $_POST['prezime'];
    $e = $_POST['email'];
    $t = $_POST['telefon'];
    $a = $_POST['adresa'];
    $r = $_POST['role'];
    if ($i != '' && $p != '' && $e != '' && $t != '' && $a != '' && $r != '') {
        $sql = "UPDATE users SET  ime='" . $i . "', prezime='" . $p . "',email='" . $e . "',  telefon='" . $t . "', adresa='" . $a . "', role='" . $r . "' WHERE id=" . $id;
        if ($db->query($sql)) {
            echo "
            <script>
            window.location.replace('../pregled-korisnika.php');
            </script>";
        } else {
            echo "Erro:" . $sql . "<br>" . $db->error;
        }
    }
}

?>