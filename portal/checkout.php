<?php

session_start();

if (isset($_SESSION['userId'])) {
    $ime = $_SESSION['ime'];
    $prezime = $_SESSION['prezime'];
    $email = $_SESSION['email'];
    $telefon = $_SESSION['telefon'];
    $adresa = $_SESSION['adresa'];
} else {
    $ime = '';
    $prezime = '';
    $email = '';
    $telefon = '';
    $adresa = '';
}

// Include the database config file 
require_once 'php/dbConfig.php';

// Initialize shopping cart class 
include_once 'php/Cart.class.php';
$cart = new Cart;

// If the cart is empty, redirect to the products page 
if ($cart->total_items() <= 0) {
    header("Location: delovi.php");
}

// Get posted data from session 
$postData = !empty($_SESSION['postData']) ? $_SESSION['postData'] : array();
unset($_SESSION['postData']);

// Get status message from session 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AutoDelovi | CHECKOUT</title>
    <meta charset="utf-8">

    <!-- Bootstrap core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Custom style -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>CHECKOUT</h1>
        <div class="col-md-12">
            <div class="checkout">


                <div class="col-md-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Vasa korpa</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session 
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                        ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                        <small class="text-muted"><?php echo $item["price"]; ?> (<?php echo $item["qty"]; ?>)</small>
                                    </div>
                                    <span class="text-muted"><?php echo $item["subtotal"]; ?></span>
                                </li>
                        <?php }
                        } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Ukupno (Dinara)</span>
                            <strong><?php echo $cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="delovi.php" class="btn btn-block btn-info">Dodaj proizvode</a>
                </div>
                <div class="col-md-8">
                    <h4 class="mb-3">Kontakt podatci</h4>
                    <form method="POST" action="php/cartAction.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Ime</label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo $ime ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Prezime</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo $prezime ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Telefon</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $telefon ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Adresa</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $adresa; ?>" required>
                        </div>
                        <input type="hidden" name="action" value="placeOrder" />
                        <input class="btn btn-success btn-lg btn-block" type="submit" name="checkoutSubmit" value="Poruci proizvode">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>