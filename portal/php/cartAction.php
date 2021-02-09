<?php
require_once 'Cart.class.php';
$cart=new Cart;


require_once 'dbConfig.php';

$redirectloc='../index.php';

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action']=='addToCart' && !empty($_REQUEST['id'])){
        $productID=$_REQUEST['id'];

        // Get product details 
        $query = $db->query("SELECT * FROM delovi WHERE id = ".$productID); 
        $row = $query->fetch_assoc(); 
        $itemData = array( 
            'id' => $row['id'], 
            'name' => $row['naziv'], 
            'price' => $row['cena'], 
            'qty' => 1 
        ); 

        $insertItem=$cart->insert($itemData);

       // Redirect to cart page 
       $redirectloc = $insertItem?'../viewCart.php':'index.php'; 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){ 
        // Update item data in cart 
        $itemData = array( 
            'rowid' => $_REQUEST['id'], 
            'qty' => $_REQUEST['qty'] 
        ); 
        $updateItem = $cart->update($itemData); 

        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action']=='removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem=$cart->remove($_REQUEST['id']);

        $redirectloc='../viewCart.php';
    }elseif($_REQUEST['action']=='placeOrder' && $cart->total_items()>0){
        $redirectloc='../checkout.php';

        $_SESSION['postData']=$_POST;

        $first_name=strip_tags($_POST['first_name']);
        $last_name=strip_tags($_POST['last_name']);
        $email=strip_tags($_POST['email']);
        $phone=strip_tags($_POST['phone']);
        $adress=strip_tags($_POST['address']);

        $errorMsg='';
        if(empty($first_name)){
            $errorMsg='Molim vas unesite vase ime</br>';
        }

        if(empty($last_name)){
            $errorMsg='Molim vas unesite vase prezime</br>';
        }

        if(empty($email)){
            $errorMsg='Molim vas unesite vas email</br>';
        }

        if(empty($phone)){
            $errorMsg='Molim vas unesite vas broj telefona</br>';
        }

        if(empty($adress)){
            $errorMsg='Molim vas unesite vasu adresu</br>';
            echo "dsdasdsa";
        }
        if(empty($errorMsg)){
            
            

            $insertCust=$db->query("INSERT INTO customers(first_name,last_name,email,phone,address) VALUES ('".$first_name."','".$last_name."','".$email."','".$phone."','".$adress."')");


            if($insertCust){
                
                $custID=$db->insert_id;//dodato naknadno

                $insertOrder = $db->query("INSERT INTO orders (customer_id, grand_total, created, status) VALUES ($custID, '".$cart->total()."', NOW(), 'Pending')"); 
             
                if($insertOrder){ 
                    $orderID = $db->insert_id; 
                     
                    // Retrieve cart items 
                    $cartItems = $cart->contents(); 
                     
                    // Prepare SQL to insert order items 
                    $sql = ''; 
                    foreach($cartItems as $item){ 
                        $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');"; 
                    } 
                     
                    // Insert order items in the database 
                    $insertOrderItems = $db->multi_query($sql); 
                     
                    if($insertOrderItems){ 
                        // Remove all items from cart 
                        $cart->destroy(); 
                         
                        // Redirect to the status page 
                        $redirectloc = '../orderSuccess.php?id='.$orderID; 
                    }else{ 
                        $sessData['status']['type'] = 'error'; 
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                    } 
                }else{ 
                    $sessData['status']['type'] = 'error'; 
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                } 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
            } 
        }else{ 
            $sessData['status']['type'] = 'error'; 
            $sessData['status']['msg'] = 'Please fill all the mandatory fields.<br>'.$errorMsg; 

            
        } 
        $_SESSION['sessData'] = $sessData; 
    } 
} 
// Redirect to the specific page    
header("Location: $redirectloc"); 

exit();



