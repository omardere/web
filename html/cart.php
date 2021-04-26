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
            $product_ID = array_column($_SESSION['cart'], 'Item_ID');
            $db=new mysqli('localhost','root','','fashion');
            $q="select * from item";
            $res=$db->query($q);//pointer of rows
            while ($row = $res->fetch_assoc()){
                foreach ($product_ID as $id){
                    if ($row['id'] == $id){
                        get_cards_cart($row['name'], $row['price'], $row['size'], $row['image'], $row['id']);
                        $total += $row['price'];
                    }
                }
            }
        }else{
            echo "<h3>Cart is Empty.</h3>";
        }
        if (isset($_POST["remove"])) {
            if ($_GET['action'] == 'remove') {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['Item_ID'] == $_GET['id']) {
                        unset($_SESSION['cart'][$key]);
                        echo "<script>
                                alert('Product has been Removed....!');
                                window.location = 'cart.php';
                            </script>";
                    }
                }
            }
        }
    ?>
</div>
<div class="Prices">
        <h3>Total = <span class="sp1">$<?php echo $total;?></span></h3>
        <br>
        <h3 style="color: green; background-color: white">😁Paiement when recieving😁</h3>
        <br>
        <button class="bt1" name="buy" style="width: 200px; margin-left: 17%;">Buy !</button>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST["Add_To_Cart"])) {
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
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_ID'=>$_POST['Item_ID']);
                echo "
                    <script>
                        alert('Item added 2');
                        window.location='home.php';
                    </script>
                ";
            }
        }else{
            $_SESSION['cart'][0]=array('Item_ID'=>$_POST['Item_ID']);
            echo "
                    <script>
                        alert('Item added 3');
                        window.location='home.php';
                    </script>
                ";
        }
    }
}


?>