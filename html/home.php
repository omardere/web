<?php require_once ('../php/cards.php')?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <?php include "../php/header.php"; ?>
    <form action="home.php" method="get">
        <nav class="catigoTree">
            <h2>Catigories</h2>
                <button name="all" value="all"  href=""><span><img src="../image/RArrow.png"></span> All</button>
                <button name="T-shirts" value="T-shirts" href=""><span><img src="../image/RArrow.png"></span> T-shirts</button>
                <button name="Casual-Shoes" value="Casual-Shoes" href=""><span><img src="../image/RArrow.png"></span> Casual-Shoes</button>
                <button name="Trousers" value="Trousers" href=""><span><img src="../image/RArrow.png"></span> Trousers</button>
                <button name="Sport-Shoes" value="Sport-Shoes" href=""><span><img src="../image/RArrow.png"></span> Sport-Shoes</button>
        </nav>
    </form>
    <div class="ItemsContainerHolder">
        <?php
               try {
                    $db=new mysqli('localhost','root','','fashion');
                    $q="select * from item";
                    $res=$db->query($q);//pointer of rows
                   $catigory_selected = "all";
                   if(isset($_GET["all"])){
                       $catigory_selected = "all";
                   }elseif (isset($_GET["T-shirts"])){
                       $catigory_selected = "T-shirts";
                   }elseif (isset($_GET["Casual-Shoes"])){
                       $catigory_selected = "Casual-Shoes";
                   }elseif (isset($_GET["Trousers"])){
                       $catigory_selected = "Trousers";
                   }elseif (isset($_GET["Sport-Shoes"])){
                       $catigory_selected = "Sport-Shoes";
                   }
                   if($catigory_selected == "all") {
                       for ($i = 0; $i < $res->num_rows; $i++) {
                           $row = $res->fetch_assoc();//fetch new row
                           component($row['name'], $row['price'], $row['size'], $row['image']);
                       }
                   }else{
                       for ($i = 0; $i < $res->num_rows; $i++) {
                           $row = $res->fetch_assoc();//fetch new row
                           if($catigory_selected == $row["catigories"]) {
                               component($row['name'], $row['price'], $row['size'], $row['image']);
                           }
                       }
                   }
                    $db->close();
                }catch (Exception $e){}
        ?>
    </div>
</body>
</html>