<?php
include 'dbConfig.php';

if(isset($_POST["action"]))
{
    $query="SELECT * from delovi WHERE id IS NOT NULL";

    if(isset($_POST["minimum_price"],$_POST["maximum_price"]) && !empty($_POST["minimum_price"] && !empty($_POST["maximum_price"])))
    {
        $query .= " AND cena BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";

    }
    if(isset($_POST["marka"]))
    {
        $marka_filter= implode("','",$_POST["marka"]);
        $query .=" 
        AND idMarka in('".$marka_filter."')"
        ;
    }
    if(isset($_POST["kategorija"]))
    {   
        $kategorija_filter= implode("','",$_POST["kategorija"]);
        $query .="
        AND idKategorija in('".$kategorija_filter."')"
        ;
    }
    $statement=$connect->prepare($query);
    $statement->execute();
    $result=$statement->fetchAll();
    $output='';
    $total_row=$statement->rowCount();
    if($total_row>0)
    {
        foreach($result as $row)
        {

            $output .='
            <div class="artikal">
            <img src="'.$row['slika'].'" alt="">
            <h3>Proizvodjac:  '.$row['proizvodjac'].'</h3>
            <h4>'.$row['naziv'].'</h4>
            <p>'.$row['opis'].'</p>
            <p><b>Cena:</b> '.$row['cena'].'</p>
            <a href="cartAction.php?action=addToCart&id='.$row['id'].'" class="add_to_cart btn">Dodaj u korp</a>
            </div>';
        }
    }
    else
    {
        echo "<h4> Nema trazenih delova!</h4>";
    }
    echo $output;
}

?>