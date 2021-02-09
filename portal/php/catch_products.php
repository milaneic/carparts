<?php
include 'dbConfig.php';

if (isset($_POST["action"])) {
    $query = "SELECT * from delovi WHERE id IS NOT NULL";

    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"] && !empty($_POST["maximum_price"]))) {
        $query .= " AND cenaPDV BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
    }
    if (isset($_POST["naziv"])) {
        $pretraga = $_POST["naziv"];

        $query .= " AND UPPER(naziv) LIKE('%" . $pretraga . "%')";
    }
    if (isset($_POST["marka"])) {
        $marka_filter = implode("','", $_POST["marka"]);
        $query .= " 
        AND idMarka in('" . $marka_filter . "')";
    }
    if (isset($_POST["kategorija"])) {
        $kategorija_filter = implode("','", $_POST["kategorija"]);
        $query .= "
        AND idKategorija in('" . $kategorija_filter . "')";
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    $total_row = $statement->rowCount();
    if ($total_row > 0) {
        foreach ($result as $row) {

            $output .= '
            <div class="artikal">
            <div class="artikal-slika">
            <img src="' . $row['slika'] . '" alt="">
            </div>
            <h3 class="ml-3">Proizvodjac:  <b>' . $row['proizvodjac'] . '</b></h3>
            <h4 class="ml-3">' . $row['naziv'] . '</h4>
            <p class="ml-3">' . $row['opis'] . '</p>
            <h5 class="ml-3">Cena: <b>' . $row['cenaPDV'] . ' </b>dinara</h5>
            <a href="php/cartAction.php?action=addToCart&id=' . $row['id'] . '" class="add_to_cart btn btn-md btn-success" >Dodaj u korpu</a>
            </div>';
        }
    } else {
        echo "<h1 style='text-align:center;' class='mt-100'> Nema trazenih delova!</h4>";
    }
    echo $output;
}
