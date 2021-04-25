<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>


</body>
</html>
<?php include "../php/header.php"; ?>
<?php
session_start();
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
                print_r($_SESSION['cart']);
            }else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_ID'=>$_POST['Item_ID']);
                echo "
                    <script>
                        alert('Item added 2');
                        window.location='home.php';
                    </script>
                ";
                print_r($_SESSION['cart']);
            }
        }else{
            $_SESSION['cart'][0]=array('Item_ID'=>$_POST['Item_ID']);
            echo "
                    <script>
                        alert('Item added 3');
                        window.location='home.php';
                    </script>
                ";
            print_r($_SESSION['cart']);
        }
    }
}


?>