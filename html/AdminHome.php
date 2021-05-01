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
    <script type="text/javascript" src="../js/AdminHome.js"></script>
</head>
<body>
<?php include "../php/AdminHeader.php";?>
<div class="ItemsContainerHolder" style="left: 10px;">
    <?php
    session_start();
        $db=new mysqli('localhost','root','','fashion');
        $q="select * from item";
        $res=$db->query($q);//pointer of rows
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_assoc();//fetch new row
                componentAdmin($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $row['quantites']);

        }
        $db->close();
    ?>
</div>
    <div class="Controlcontainer">
        <div  style="margin: 0 50px; display: flex; flex-flow: row;">
            <button class="switch" type="button" name="Add"  onclick="Add_div()">Add</button>
            <button class="switch" name="Update" type="button" onclick="Update_div()">Update</button>
        </div>
        <form action="AdminHome.php" method="post" enctype="multipart/form-data">
        <div id="Add" class="Add_Control">
            <div class="information">
                <label style="font-size: 20px">Name: </label> <input type="text" required name="Item_name" placeholder="Item Name" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Size: </label> <input type="text" required name="Item_size" placeholder="S-M-L-XL" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Price: </label> <input type="number" required name="Item_price" placeholder="0" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <h3>Catigories:</h3>
                <div style="display: flex; flex-flow: column; font-size: 11px;  width: 100%; margin: 10px 0">
                    <div class="rad">
                        <input type="radio" id="male" name="Item_catigory" value="T-shirts">
                        <label for="T-shirts">T-Shirts</label>
                    </div>
                    <div class="rad">
                        <input type="radio" id="female" name="Item_catigory" value="Casual-Shoes">
                        <label for="Casual-Shoes">Casual Shoes</label>
                    </div>
                    <div class="rad">
                        <input type="radio" id="other" name="Item_catigory" value="Trousers">
                        <label for="Trousers">Trousers</label>
                    </div>
                    <div class="rad">
                    <input type="radio" id="other" name="Item_catigory" value="Sport-Shoes">
                    <label for="Sport-Shoes">Sport Shoes</label>
                    </div>
                </div>
                <label style="font-size: 20px">Quantity: </label> <input required type="number" name="Item_quantity" placeholder="Item Quantity" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Image: </label> <input type="file" required name="Item_image" placeholder="Item image" style="text-align: center; cursor: pointer; font-size: 15px; margin-bottom: 10px;">
            </div>
            <button name="AddItem" type="submit" value="AddItem" class="add">Add Item</button>
        </div>
        </form>
        <form action="AdminHome.php" method="post" enctype="multipart/form-data">
        <div id="Update" class="Update_Control">
            <div class="information">
                <label style="font-size: 20px">ID: </label> <input type="number" required name="UItem_ID" placeholder="Item ID" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Name: </label> <input type="text"  name="UItem_name" placeholder="Item Name" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Size: </label> <input type="text"  name="UItem_size" placeholder="S-M-L-XL" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Price: </label> <input type="number"  name="UItem_price" placeholder="0" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <h3>Catigories:</h3>
                <div style="display: flex; flex-flow: column; font-size: 11px;  width: 100%; margin: 10px 0">
                    <div class="rad">
                        <input type="radio" id="male" name="UItem_catigory" value="T-shirts">
                        <label for="T-shirts">T-Shirts</label>
                    </div>
                    <div class="rad">
                        <input type="radio" id="female" name="UItem_catigory" value="Casual-Shoes">
                        <label for="Casual-Shoes">Casual Shoes</label>
                    </div>
                    <div class="rad">
                        <input type="radio" id="other" name="UItem_catigory" value="Trousers">
                        <label for="Trousers">Trousers</label>
                    </div>
                    <div class="rad">
                        <input type="radio" id="other" name="UItem_catigory" value="Sport-Shoes">
                        <label for="Sport-Shoes">Sport Shoes</label>
                    </div>
                </div>
                <label style="font-size: 20px">Quantity: </label> <input  type="number" name="UItem_quantity" placeholder="Item Quantity" maxlength="20" style="text-align: center; font-size: 15px; margin-bottom: 10px;">
                <label style="font-size: 20px">Image: </label> <input type="file"  name="UItem_image" placeholder="Item image" style="text-align: center; cursor: pointer; font-size: 15px; margin-bottom: 10px;">
            </div>
            <button name="Update_Item" type="submit" value="Update_Item" class="add">Update Item</button>
            <input type="hidden" name="Update_Item" value="Update_Item">
        </div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['AddItem'])){
    $file = $_FILES['Item_image'];
    $file_name = explode(".", $file['name']);
    $actual_file_ext = strtolower(end($file_name));
    $allowd = array("jpg", "jpeg", "png");
    if ($_POST['Item_name'] == ""){
        echo "<script>alert('Please be sure to fill all fields.')</script>";
    }
    elseif ($_POST['Item_size'] == ""){
        echo "<script>alert('Please be sure to fill all fields.')</script>";
    }elseif ($_POST['Item_price'] == ""){
        echo "<script>alert('Please be sure to fill all fields.')</script>";
    }elseif ($_POST['Item_quantity'] == ""){
        echo "<script>alert('Please be sure to fill all fields.')</script>";
    }elseif ($_POST['Item_catigory'] == ""){
        echo "<script>alert('Please be sure to fill all fields.')</script>";
    }elseif (!in_array($actual_file_ext, $allowd)){
        echo "<script>alert('You can not upload files of this type.')</script>";
    }else{
        $file_path = "../image/".$file_name[0].".".$file_name[1];
        $name = $_POST['Item_name'];
        $price = $_POST['Item_price'];
        $size = $_POST['Item_size'];
        $quantity = $_POST['Item_quantity'];
        $catigory = $_POST['Item_catigory'];

        $db = new mysqli('localhost', 'root', '', 'fashion');
        $q = "INSERT INTO `item`(`name`, `price`, `size`, `quantites`, `image`, `catigories`) VALUES ('". $name ."', '". $price."', '" . $size . "', '" . $quantity . "', '" . $file_path . "', '".$catigory."');";
        if ($db->query($q) === TRUE) {
            echo "<script>alert('inserte done ". $_POST['Item_name'] ." ". $_POST['Item_price'] ."  ". $_POST['Item_size'] ."  ". $_POST['Item_quantity'] ."  ". $_POST['Item_catigory'] ." ');</script>";
        } else {
            echo "<script>alert('Error: ".$q." <br> ".$db->error()."')</script>";
        }

        $db->close();

    }
    echo '<script>window.location = "AdminHome.php";</script>';
}
if (isset($_POST['Update_Item'])){
    $Ufile = $_FILES['UItem_image'];
    $Ufile_name = explode(".", $Ufile['Uname']);
    $Uactual_file_ext = strtolower(end($Ufile_name));
    $Uallowd = array("jpg", "jpeg", "png");
    $Ufile_path = "../image/".$Ufile_name[0].".".$Ufile_name[1];
    $UID = $_POST['UItem_ID'];
    $Uname = $_POST['UItem_name'];
    $Uprice = $_POST['UItem_price'];
    $Usize = $_POST['UItem_size'];
    $Uquantity = $_POST['UItem_quantity'];
    $Ucatigory = $_POST['UItem_catigory'];

    $db = new mysqli('localhost', 'root', '', 'fashion');

    if ($_POST['UItem_name'] != ""){
        $qn = "UPDATE `item` SET `name`='".$Uname."' WHERE `id`='".$UID."';";
        $db->query($qn);
    }
    if ($_POST['UItem_size'] != ""){
        $qs = "UPDATE `item` SET `size`='".$Usize."' WHERE `id`='".$UID."';";
        $db->query($qs);
    }
    if ($_POST['UItem_price'] != ""){
        $qp = "UPDATE `item` SET `price`='".$Uprice."' WHERE `id`='".$UID."';";
        $db->query($qp);
    }
    if ($_POST['UItem_quantity'] != ""){
        $qq = "UPDATE `item` SET `quantites`='".$Uquantity."' WHERE `id`='".$UID."';";
        $db->query($qq);
    }
    if ($_POST['UItem_catigory'] != ""){
        $qc = "UPDATE `item` SET `catigories`='".$Ucatigory."' WHERE `id`='".$UID."';";
        $db->query($qc);
    }
    if (in_array($Uactual_file_ext, $Uallowd)){
        $qi = "UPDATE `item` SET `image`='".$Ufile_path."' WHERE `id`='".$UID."';";
        $db->query($qi);
    }
    $db->commit();
    $db->close();
    echo '<script>window.location = "AdminHome.php";</script>';
}
if (isset($_POST['Remove'])){
    if ($_GET['action'] == 'remove') {
        $db = new mysqli('localhost', 'root', '', 'fashion');
        $q = "select * from item";
        $res1 = $db->query($q);//pointer of rows
        while ($row = $res1->fetch_assoc()) {
                if ($row['id'] == $_POST['Item_ID1']) {
                    $q1 = "DELETE FROM `item` WHERE `item`.`id`=" . $_POST['Item_ID1'] . ";";
                    $res2 = $db->query($q1);
                    $db->commit();
                }
        }

        $db->close();
        echo '<script>window.location = "AdminHome.php";</script>';
    }
}


?>