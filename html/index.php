<?php include "../php/cards.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css"/>
    <script type="text/javascript" src="../js/home.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<?php include "../php/header.php"; ?>
    <form action="index.php" method="POST">
        <nav class="catigoTree">
            <h2>Catigories</h2>
                <button name="cat_btn" value="all" ><span><img src="../image/RArrow.png"></span> All</button>
                <button name="cat_btn" value="T-shirts" ><span><img src="../image/RArrow.png"></span> T-shirts</button>
                <button name="cat_btn" value="Casual-Shoes" ><span><img src="../image/RArrow.png"></span> Casual-Shoes</button>
                <button name="cat_btn" value="Trousers" ><span><img src="../image/RArrow.png"></span> Trousers</button>
                <button name="cat_btn" value="Sport-Shoes"><span><img src="../image/RArrow.png"></span> Sport-Shoes</button>
        </nav>
    </form>
    <div class="ItemsContainerHolder">
        <?php
        session_start();
               try {
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
                   if (isset($_POST["Add_To_Cart"])) {
                       if (isset($_SESSION['cart'])){
                           $my_Itmes = array_column($_SESSION['cart'], 'Item_ID');
                           if (in_array($_POST['Item_ID'] ,$my_Itmes)) {
                               echo '<script>
                                             alert("Item allready chosen");
                                             window.location = "index.php";
                                     </script>';
                           }else{
                               $totquan = $_POST['product_Total_quantity'] - 1;
                               $count = count($_SESSION['cart']);
                               $_SESSION['cart'][$count]=array('Item_ID'=>$_POST['Item_ID'], 'product_quantity'=>1, 'product_Total_quantity'=> $totquan);
                               echo '<script>alert("Item has selected"); window.location = "index.php";</script>';
                           }
                       }else{
                           $totquan = $_POST['product_Total_quantity'] - 1;
                           $_SESSION['cart'][0]=array('Item_ID'=>$_POST['Item_ID'], 'product_quantity'=>1, 'product_Total_quantity'=>$totquan);
                           echo '<script>alert("Item has selected"); window.location = "index.php";</script>';
                       }
                   }
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
                           component($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $row['quantites']);

                       }
                   }else{
                       for ($i = 0; $i < $res->num_rows; $i++) {
                           $row = $res->fetch_assoc();//fetch new row
                           if($catigory_selected == $row["catigories"]) {
                               component($row['name'], $row['price'], $row['size'], $row['image'], $row['id'], $row['quantites']);
                           }
                       }
                   }
                    $db->close();
                }catch (Exception $e){}
        ?>
    </div>
</body>
</html>