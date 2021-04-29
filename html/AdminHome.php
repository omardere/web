<?php include "../php/cards.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminHome</title>
    <link rel="stylesheet" href="../css/AdminHome.css">
</head>
<body>
<?php include "../php/AdminHeader.php";?>
<div class="ItemsContainerHolder" style="left: 10px;">
    <?php
    session_start();
    try {
        if(isset($_POST['cat_btn'])) {
            if (isset($_SESSION['catigory_selected'])) {
                $count = count($_SESSION['catigory_selected']) - 1;
                $_SESSION['catigory_selected'][$count] = $_POST['cat_btn'];
            } else {
                $_SESSION['catigory_selected'][0] = $_POST['cat_btn'];
            }
        }else{
            $_SESSION['catigory_selected'][0] = 'all';
        }
        $db=new mysqli('localhost','root','','fashion');
        $q="select * from item";
        $res=$db->query($q);//pointer of rows
        $catigory_selected = $_SESSION['catigory_selected'][0];
        if($catigory_selected == "all") {
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_assoc();//fetch new row
                componentAdmin($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $row['quantites']);

            }
        }else{
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_assoc();//fetch new row
                if($catigory_selected == $row["catigories"]) {
                    componentAdmin($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $row['quantites']);
                }
            }
        }
        $db->close();
    }catch (Exception $e){}
    ?>
</div>
<form action="AdminHome.php" method="post">
    <div class="Control">
        <div class="information">
            <label style="font-size: 20px">Name: </label> <input type="text" name="Item_name" placeholder="Item Name" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
            <label style="font-size: 20px">Size: </label> <input type="text" name="Item_size" placeholder="S-M-L-XL" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
            <label style="font-size: 20px">Price: </label> <input type="number" name="Item_price" placeholder="0" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
            <label style="font-size: 20px">Quantity: </label> <input type="number" name="Item_quantity" placeholder="Item Name" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
            <label style="font-size: 20px">Image: </label> <input type="file" name="Item_image" placeholder="Item image"style="text-align: center; cursor: pointer; font-size: 15px; margin-bottom: 10px;">
        </div>
        <button name="AddItem" value="AddItem" class="add">Add Item</button>
    </div>
</form>
</body>
</html>
