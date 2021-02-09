<?php
session_start();
if ($_SESSION['role'] != "1")
    header("Location:index.php?error=invalid");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>AutoDelovi | Pregled korisnika</title>
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
                        <li class="nav-item ">
                            <a class="nav-link" href="admin.php">Pregled delova</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="pregled-korisnika.php">Pregled korisnika<span class="sr-only">(current)</span></a>
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
            <h1 class="mt-3 mb-3">Pregled svih korisnika</h1>
            <table class="table table-striped">
                <tr>
                    <th class="text-center">ID:</th>
                    <th class="text-center">Username:</th>
                    <th class="text-center">Ime:</th>
                    <th class="text-center">Prezime:</th>
                    <th class="text-center">Emali:</th>
                    <th class="text-center">Telefon:</th>
                    <th class="text-center">Adresa:</th>
                    <th class="text-center">Role:</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                include 'php/dbConfig.php';

                $query = "SELECT * FROM users";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                $total_row = $statement->rowCount();
                if ($total_row > 0) {
                    foreach ($result as $row) { ?>

                        <tr class="">
                            <td class="text-center"><?= $row['id'] ?></td>
                            <td class="text-center"><?= $row['username'] ?></td>
                            <td class="text-center"><?= $row['ime'] ?></td>
                            <td class="text-center"><?= $row['prezime'] ?></td>
                            <td class="text-center"><?= $row['email'] ?></td>
                            <td class="text-center"><?= $row['telefon'] ?></td>
                            <td class="text-center"><?= $row['adresa'] ?></td>
                            <?php if ($row['role'] == '1') { ?>
                                <td class="text-center">Admin</td>
                            <?php } else { ?>
                                <td class="text-center">Korisnik</td>
                            <?php } ?>
                            <td class="text-center"><a class="btn btn-primary" onclick="return confirm('Da li ste sigurni da zelite da obrisete korisnika?')? window.location.href='php/delete_user.php?id=<?= $row['id'] ?>':false;">Brisi korisnika</a></td>
                            <td class="text-center"><a class="btn btn-info" href="php/change_user.php?id=<?= $row['id'] ?>">Izmena korisnika</a></td>
                        </tr>
                <?php  }
                }
                ?>

            </table>
        </div>
    </main>
</body>

</html>