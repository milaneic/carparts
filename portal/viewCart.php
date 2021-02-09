<?php
// Initialize shopping cart class 
include_once 'php/Cart.class.php';
$cart = new Cart;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AutoDelovi | Korpa</title>
    <meta charset="utf-8">

    <!-- Bootstrap core CSS -->
    <link href="css/viewCartBootstrap.css" rel="stylesheet">

    <!-- Custom style -->
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>

    <script>
        function updateCartItem(obj, id) {
            $.get("php/cartAction.php", {
                action: "updateCartItem",
                id: id,
                qty: obj.value
            }, function(data) {
                if (data == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Vasa korpa</h1>
        <div class="row">
            <div class="cart">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="45%">Proizvod</th>
                                    <th width="10%">Cena</th>
                                    <th width="15%">Kolicina</th>
                                    <th class="text-right" width="20%">Ukupno</th>
                                    <th width="10%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cart->total_items() > 0) {
                                    // Get cart items from session 
                                    $cartItems = $cart->contents();
                                    foreach ($cartItems as $item) {
                                ?>
                                        <tr>
                                            <td><?php echo $item["name"]; ?></td>
                                            <td><?php echo '' . $item["price"] . ' Dinara'; ?></td>
                                            <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" /></td>
                                            <td class="text-right"><?php echo '' . $item["subtotal"] . ' Dinara'; ?></td>
                                            <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')?window.location.href='php/cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="itrash"></i> </button> </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5">
                                            <p style="text-align: center; font-size: 20px">Vasa korpa je prazna...</p>
                                        </td>
                                    <?php } ?>
                                    <?php if ($cart->total_items() > 0) { ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Ukupno</strong></td>
                                        <td class="text-right"><strong><?php echo $cart->total() . ' Dinara'; ?></strong></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <a href="delovi.php" class="btn btn-lg btn-block btn-success">Nastavite kupovinu</a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <?php if ($cart->total_items() > 0) { ?>
                                <a href="checkout.php" class="btn btn-lg btn-block btn-primary">Zavrsi kupovinu</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>