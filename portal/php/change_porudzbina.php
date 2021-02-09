<?php

session_start();
if ($_SESSION['role'] != '1' || $_GET['id'] == null) {
    header("Location:../index.php");
}

$id = $_GET['id'];
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
                            <a class="nav-link" href="../admin.php">Pregled delova</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pregled-korisnika.php">Pregled korisnika</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../pregled-porudzbina.php">Pregled porudzbina<span class="sr-only">(current)</span></a>
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
        <div class="container">
            <h1 class="mb-3 mt-3">Izmena porudzbina</h1>
            <form action="#" method="POST">
                <?php
                $query = "SELECT * from orders WHERE id=" . $id;
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetch();

                ?>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" readonly="" class="form-control" value="<?= $result['id'] ?>"></div>

                <div class="form-group">
                    <label for="">Kupac</label>
                    <input type="text" readonly="" class="form-control" value="<?= $result['customer_id'] ?>"></div>
                <div class="form-group">
                    <label for="">Ukupno</label>
                    <input type="text" readonly="" class="form-control" value="<?= $result['grand_total'] ?>"></div>
                <div class="form-group">
                    <label for="">Kreiran</label>
                    <input type="text" readonly="" class="form-control" value="<?= $result['created'] ?>"></div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Izmeni porudzbinu" class="btn btn-danger">
            </form>

    </main>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $status = $_POST['status'];
    $sql = "UPDATE orders set status='" . $status . "' WHERE id=" . $id;
    if ($db->query($sql) === TRUE) {
        header("Location:../pregled-porudzbina.php");
    }
}
?>