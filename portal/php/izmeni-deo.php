<?php
session_start();
if ($_SESSION['role'] != '1') {
    header("Location:../index.php?error=invalid");
}
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>AutoDelov | Admin panel</title>
</head>

<body>
    <style>
        form-control input {
            width=100%;
        }
    </style>
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
                        <li class="nav-item">
                            <a class="nav-link" href="../pregled-porudzbina.php">Pregled porudzbina</a>
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

            <?php
            include 'dbConfig.php';

            $query = "SELECT * FROM delovi  WHERE id=" . $id;
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetch();

            $query = "SELECT  * from kategorija";
            $statement = $connect->prepare($query);
            $statement->execute();
            $kategorije = $statement->fetchAll();

            $query = "SELECT  * from vozilo";
            $statement = $connect->prepare($query);
            $statement->execute();
            $marke = $statement->fetchAll();
            ?>

            <h1 class="mt-5 mb-5">Izmeni deo</h1>

            <form method="POST" enctype="multipart/form-data" action='#'>
                <div class="form-group">
                    <label for="naziv">Naziv</label>
                    <input type="text" class="form-control" id="naziv" name='naziv' value="<?= $result['naziv'] ?>" placeholder="Unesi naziv">
                </div>
                <div class="form-group">
                    <label for="proizvodjac">Proizvodjac</label>

                    <input type="text" class="form-control" id="proizvodjac" name='proizvodjac' value="<?= $result['proizvodjac'] ?>" placeholder="Unesi proizvodjaca">
                </div>
                <div class="form-group">
                    <label for="opis">Opis proizvoda</label>
                    <input type="text" class="form-control" id="opis" name='opis' value="<?= $result['opis'] ?>" placeholder="Unesi opis proizvoda">
                </div>
                <div class="form-group">
                    <label for="cenaPDV">Cena proizvoda</label>
                    <input type="text" class="form-control" id="cenaPDV" name='cenaPDV' value="<?= $result['cenaPDV'] ?>" placeholder="Unesi cenu proizvoda">
                </div>
                <div class="form-group">
                    <label for="slika">Slika proizvoda</label>
                    <br>
                    <img src="<?= $result['slika'] ?>">
                </div>
                <div>
                    <input type="file" name="fileToUpload">
                </div>
                <div class="form-group">
                    <label for="kategorija">Kategorija dela</label>
                    <select name="kategorija" id="kategorija" class="form-control">
                        <?php
                        foreach ($kategorije as $k) {
                            echo $k['naziv'];
                        ?>
                            <option value="<?= $k['id']  ?>" <?php
                                                                if ($result['idKategorija'] == $k['id']) echo 'selected';
                                                                ?>><?= $k['naziv'] ?></option>
                        <?php  }  ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="marka">Marka vozila</label>
                    <select name="marka" id="marka" class="form-control">
                        <?php
                        foreach ($marke as $k) {
                            echo $k['marka'];
                        ?>
                            <option value="<?= $k['id']  ?>" <?php
                                                                if ($result['idMarka'] == $k['id']) echo 'selected';
                                                                ?>><?= $k['marka'] ?></option>
                        <?php  }  ?>
                    </select>
                </div>



                <input type="submit" class="btn btn-primary" name='submit' value="Sacuvaj"></input>
            </form>





        </div>
    </main>
</body>

</html>



<?php
if (isset($_POST["submit"])) {
    if ($_FILES['fileToUpload']['name'] == '') {
        echo ("prazno");
    } else {
        $target_dir = "../img/products";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                // update
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    $naziv = $_POST['naziv'];
    $proizvodjac = $_POST['proizvodjac'];
    $opis = $_POST['opis'];
    $kategorija = $_POST['kategorija'];
    $marka = $_POST['marka'];
    $cenaPDV = $_POST['cenaPDV'];;


    echo "<br>" .  $naziv;
    echo "<br>" . $proizvodjac;
    echo "<br>" . $opis;
    echo "<br>" . $kategorija;
    echo "<br>" . $marka;

    if ($naziv != '' && $proizvodjac != '' && $opis != '' && $kategorija != '' && $marka != '') {
        echo "usao";
        $sql = "";
        if ($_FILES['fileToUpload']['name'] != "") {
            $sql .= "UPDATE delovi SET  naziv='" . $naziv . "', proizvodjac='" . $proizvodjac . "',cenaPDV='" . $cenaPDV . "', slika='/portal/img/products/" . $_FILES['fileToUpload']['name'] . "', opis='" . $opis . "', idKategorija='" . $kategorija . "', idMarka='" . $marka . "' WHERE id=" . $id;
            if ($db->query($sql) === TRUE) {
                echo "
                        <script>
                        window.location.replace('../admin.php');
                        </script>";
            } else {
                echo "Erro:" . $sql . "<br>" . $db->error;
            }
        } else {
            $sql .= "UPDATE delovi SET  naziv='" . $naziv . "', proizvodjac='" . $proizvodjac . "', opis='" . $opis . "',cenaPDV='" . $cenaPDV . "', idKategorija='" . $kategorija . "', idMarka='" . $marka . "' WHERE id=" . $id;
            if ($db->query($sql) === TRUE) {
                echo "
                        <script>
                        window.location.replace('../admin.php');
                        </script>";
            } else {
                echo "Erro:" . $sql . "<br>" . $db->error;
            }
        }
    } else {
        echo 'jeste';
    }
}
?>