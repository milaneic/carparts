<?php 
if(!isset($_REQUEST['id'])){ 
    header("Location: index.php"); 
} 
 
// Include the database config file 
require_once 'php/dbConfig.php'; 
 
// Fetch order details from database 
$result = $db->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: index.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Narudzbina</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<!-- <link href="css/style.css" rel="stylesheet"> -->
</head>
<body>
<div class="container">
    <h1>Status narudzbine</h1><br>  
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success">Vasa porudzbina je uspesno obradjena.</div>
            </div>
            <br>    
            <!-- Order status & shipping info -->
            <div class="row">
                <div class="col-md-12 text-left">   
                <h3>Podatci narudzbine</h3><br> 
                <p><b>Broj narudzbine:</b> #<?php echo $orderInfo['id']; ?></p><br> 
                <p><b>Ukupno:</b> <?php echo $orderInfo['grand_total'].' Dinara'; ?></p><br> 
                <p><b>Vreme kreiranja</b> <?php echo $orderInfo['created']; ?></p><br> 
                <p><b>Naziv kupca:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p><br> 
                <p><b>Email:</b> <?php echo $orderInfo['email']; ?></p><br> 
                <p><b>Telefon:</b> <?php echo $orderInfo['phone']; ?></p><br>   
                </div>
            </div>
            
            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Proizvod</th>
                            <th>Cena</th>
                            <th>Kolicina</th>
                            <th>Ukupno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $result = $db->query("SELECT i.*, d.naziv, d.cenaPDV FROM order_items as i LEFT JOIN delovi as d ON d.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result->num_rows > 0){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["cenaPDV"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
                        <tr>
                            <td><?php echo $item["naziv"]; ?></td>
                            <td><?php echo $price.' Dinara'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo $sub_total.' Dinara'; ?></td>
                        </tr>
                        <?php } 
                        } ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-success">Vrati se na pocetnu stranu</a>
            </div>
        <?php } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Vasa narudzbina nije uspela.</div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>