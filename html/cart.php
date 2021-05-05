<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/cartstyle.css">
</head>
<body>
<?php
session_start();
include "../php/header.php";
include "../php/cart_cards.php";
?>
<div class="cart_Items_container">
    <?php
    $total = 0;
    if(isset($_SESSION['cart'])){
        if (count($_SESSION['cart']) == 0){
            echo "<h3 style='text-align: center;'>Cart is Empty.</h3>";
        }
        else {
            $db = new mysqli('localhost', 'root', '', 'fashion');
            $q = "select * from item";
            $res = $db->query($q);//pointer of rows
            while ($row = $res->fetch_assoc()) {
                foreach ($_SESSION['cart'] as $id => $value) {
                    if ($row['id'] == $value['Item_ID']) {
                        get_cards_cart($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $value['product_quantity']);
                        $total += $row['price'] * $value['product_quantity'];
                    }
                }
            }
            $db->close();
        }
    }

    if (isset($_POST["remove"])) {
        if ($_GET['action'] == 'remove') {
            $db=new mysqli('localhost','root','','fashion');
            $q="select * from item";
            $res=$db->query($q);//pointer of rows
            while ($row = $res->fetch_assoc()) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['Item_ID'] == $_GET['id'] && $value['Item_ID'] == $row['id']) {
                        $_SESSION['cart'][$key] = array('Item_ID' => $value['Item_ID'], 'product_quantity' => 1, 'product_Total_quantity' => $row['quantites']);
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    }
                }
            }
            echo '<script>window.location = "cart.php";</script>';
            $db->close();
        }

    }
    if (isset($_SESSION['User'])){
        if (count($_SESSION['User']) == 1){
            echo "<script>
                                    sign_in_clicked();
                                </script>";
        }
        else{
            echo "<script>
                                    log_out_clicked();
                                </script>";
        }
    }
    ?>
</div>
<div id="pop" style="display: none; text-align: center; position: absolute; background-color: rgba(0,0,0,0.5); width: 100%; height: 100%; z-index: 1000;">
    <h1 style="position: absolute; right: 50%; top: 50%;">Test Test</h1>
</div>
<form action="cart.php" method="post">
    <div class="Prices">
        <h3>Total = <span class="sp1">$<?php echo $total;?></span></h3>
        <br>
        <h3 style="color: green; background-color: white">😁Paiement when recieving😁</h3>
        <br>
        <button type="submit" class="bt1" name="buy" value="buy" style="width: 200px; margin-left: 17%;">Buy !</button>
    </div>
</form>
</body>
</html>
<?php
try {
    if (isset($_POST["dicrease_quantity"])) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $value) {
                if ($_POST['product_quantity'] == $value['Item_ID']) {
                    if (1 < $value['product_quantity']) {
                        $value['product_quantity'] -= 1;
                        $value['product_Total_quantity'] += 1;
                        $_SESSION['cart'][$id] = array('Item_ID' => $value['Item_ID'], 'product_quantity' => $value['product_quantity'], 'product_Total_quantity' => $value['product_Total_quantity']);
                    }
                }
            }
            echo '<script>window.location = "cart.php";</script>';
        }
    } elseif (isset($_POST["increase_quantity"])) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $value) {
                if ($_POST['product_quantity'] == $value['Item_ID']) {
                    if ($value['product_Total_quantity'] > 0) {
                        $value['product_quantity'] += 1;
                        $value['product_Total_quantity'] -= 1;
                        $_SESSION['cart'][$id] = array('Item_ID' => $value['Item_ID'], 'product_quantity' => $value['product_quantity'], 'product_Total_quantity' => $value['product_Total_quantity']);
                        echo '<script>window.location = "cart.php";</script>';
                    } else {
                        echo '<script>alert("No enough items in the store."; window.location = "cart.php";</script>';
                    }
                }
            }
        }
    }
    if (isset($_POST['buy'])) {
        $db = new mysqli('localhost', 'root', '', 'fashion');
        $q = "select * from item";
        $res2 = $db->query($q);//pointer of rows
        $sDate = date("Y-m-d H:i:s");
        if (isset($_SESSION['User'])) {
            if (count($_SESSION['User']) == 1) {
                $email = array_column($_SESSION['User'], "email");
                while ($row = $res2->fetch_assoc()) {
                    foreach ($_SESSION['cart'] as $id => $value) {
                        if ($row['id'] == $value['Item_ID']) {
                            $sql = "UPDATE item SET  `quantites`= " . $value['product_Total_quantity'] . " WHERE id = " . $value['Item_ID'];
                            $db->query($sql);
                            $sqlorder = "INSERT INTO `user_order`(`item_id`, `user_email`, `quantity`) VALUES ('" . $value['Item_ID'] . "', '" . $email[0] . "', '" . $value['product_quantity'] . "');";
                            $db->query($sqlorder);
                        }
                    }
                }
                $db->close();
                foreach ($_SESSION['cart'] as $id => $value) {
                    unset($_SESSION['cart'][$id]);
                }
                echo '<script> window.location = "cart.php";</script>';
            } else {
                echo '<script>alert("you should log in first");</script>';
                echo '<script> window.location = "cart.php";</script>';
            }
        } else {
            echo '<script>alert("you should log in first");
                                window.location = "log_in_sign_up.html";
                  </script>';
        }
    }
}catch (Exception $e){}
?>
