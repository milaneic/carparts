<?php

session_start();
if ($_SESSION['role'] != '1' || $_GET['id'] == null) {
    header("Location:../index.php");
}

$id = $_GET['id'];
$c = $_GET['customer'];
require_once("dbConfig.php");
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
                            <a class="nav-link" href="../admin.php">Pregled delova<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pregled-korisnika.php">Pregled korisnika</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../pregled-porudzbina.php">Pregled porudzbina<span class="sr-only">(current)</span></a>
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

    <main>
        <h1 class="mb-3 mt-3">Detalji korisnika</h1>
        <table class="table">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Ime</th>
                <th class="text-center">Prezime</th>
                <th class="text-center">Email</th>
                <th class="text-center">telefon</th>
                <th class="text-center">Adresa</th>
            </tr>

            <?php
            $query = "SELECT c.* FROM orders o JOIN customers c on o.customer_id=c.id WHERE c.id=" . $c;
            $statement = $connect->prepare($query);
            $statement->execute();
            $row = $statement->fetch();
            $output = '

        <tr>
        <td class="text-center">' . $row['id'] . '</td>
        <td class="text-center">' . $row['first_name'] . '</td>
        <td class="text-center">' . $row['last_name'] . '</td>
        <td class="text-center">' . $row['email'] . '</td>
        <td class="text-center">' . $row['phone'] . '</td>
        <td class="text-center">' . $row['address'] . '</td>
        </tr>';


            echo ($output);

            ?>
        </table>
        <h3 class="mt-3 mb-3">Pregled narucenih proizvoda</h3>
        <table class="table table-striped">
            <tr>
                <th class="text-center">Redni broj</th>
                <th class="text-center">Naziv</th>
                <th class="text-center">Opis</th>
                <th class="text-center">Cena</th>
                <th class="text-center">Kolicina</th>
                <th class="text-center">Kategorija</th>
            </tr>
            <?php
            $query = "SELECT o.*,p.*,k.naziv as kat_naziv FROM order_items o JOIN delovi p on o.product_id=p.id join kategorija k on p.idKategorija=k.id WHERE o.order_id=" . $id;
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();
            $output = '';
            if ($total_row > 0) {
                foreach ($result as $row) {
                    $broj = 1;
                    $output .= '
        <tr>
        <td class="text-center">' . $broj . '</td>
        <td class="text-center">' . $row['naziv'] . '</td>
        <td class="text-center">' . $row['opis'] . '</td>
        <td class="text-center">' . $row['cenaPDV'] . '</td>
        <td class="text-center">' . $row['quantity'] . '</td>
        <td class="text-center">' . $row['kat_naziv'] . '</td>
        </tr>';
                    $broj++;
                }
                echo ($output);
            }
            ?>
    </main>
</body>

</html>