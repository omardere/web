

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
        $db=new mysqli('localhost','root','','fashion');
        $q="select * from item";
        $res=$db->query($q);//pointer of rows
        while ($row = $res->fetch_assoc()){
            foreach ($_SESSION['cart'] as $id => $value){
                if ($row['id'] == $value['Item_ID']){
                    get_cards_cart($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $value['product_quantity']);
                    $total += $row['price'] * $value['product_quantity'];

                }
            }
        }
    }if (count($_SESSION['cart']) == 0){
        echo "<h3 style='text-align: center;'>Cart is Empty.</h3>";
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
                        echo "<script>
                                    alert('Product has been Removed....!');
                                    window.location = 'cart.php';
                                </script>";
                    }
                }
            }
        }
    }
    ?>
</div>
<form action="cart.php" method="post">
    <div class="Prices">
        <h3>Total = <span class="sp1">$<?php echo $total;?></span></h3>
        <br>
        <h3 style="color: green; background-color: white">😁Paiement when recieving😁</h3>
        <br>
        <button class="bt1" name="buy" value="buy" style="width: 200px; margin-left: 17%;">Buy !</button>
    </div>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST["increase_quantity"])){
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $value){
                if ($_POST['product_quantity'] == $value['Item_ID']) {
                    if ($value['product_Total_quantity'] > 0) {
                        $value['product_quantity'] += 1;
                        $value['product_Total_quantity']-=1;
                        $_SESSION['cart'][$id] = array('Item_ID' => $value['Item_ID'], 'product_quantity' => $value['product_quantity'], 'product_Total_quantity' => $value['product_Total_quantity']);
                        echo "<script>window.location = 'cart.php'</script>";
                    } else {
                        echo '<script>alert("No enough items in the store."; window.location = "cart.php";</script>';
                    }
                }
            }
        }
    }
    elseif (isset($_POST["dicrease_quantity"])){
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $value){
                if ($_POST['product_quantity'] == $value['Item_ID']){
                    if (1 < $value['product_quantity']){
                        $value['product_quantity'] -= 1;
                        $value['product_Total_quantity']+=1;
                        $_SESSION['cart'][$id] = array('Item_ID' => $value['Item_ID'], 'product_quantity' => $value['product_quantity'], 'product_Total_quantity' => $value['product_Total_quantity']);
                        echo "<script>window.location = 'cart.php'</script>";
                    }
                }
            }
        }
    }
    elseif (isset($_POST["Add_To_Cart"])) {
        if (isset($_SESSION['cart'])){
            $my_Itmes = array_column($_SESSION['cart'], 'Item_ID');
            if (in_array($_POST['Item_ID'] ,$my_Itmes)) {
                echo "
                    <script>
                        alert('Item already added 1');
                        window.location='home.php';
                    </script>
                ";
            }else{
                $totquan = $_POST['product_Total_quantity'] - 1;
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_ID'=>$_POST['Item_ID'], 'product_quantity'=>1, 'product_Total_quantity'=> $totquan);
                echo "
                    <script>
                        alert('Item added 2');
                        window.location='home.php';
                    </script>
                ";
            }
        }else{
            $totquan = $_POST['product_Total_quantity'] - 1;
            $_SESSION['cart'][0]=array('Item_ID'=>$_POST['Item_ID'], 'product_quantity'=>1, 'product_Total_quantity'=>$totquan);
            echo "
                    <script>
                        alert('Item added 3');
                        window.location='home.php';
                    </script>
                ";
        }
    }
    if (isset($_POST['buy'])){
        $db=new mysqli('localhost','root','','fashion');
        $q="select * from item";
        $res2=$db->query($q);//pointer of rows
        while ($row = $res2->fetch_assoc()) {
            foreach ($_SESSION['cart'] as $id => $value){
                if ($row['id'] == $value['Item_ID']){
                    $sql = "UPDATE item SET  `quantites`= ".$value['product_Total_quantity']." WHERE id = ".$value['Item_ID'];
                    $db->query($sql);
                    unset($_SESSION['cart'][$id]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
        }
    }
}
?>
