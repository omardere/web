<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About us</title>
  <link rel="stylesheet" href="../css/aboutus.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/home.css" type="text/css">
</head>
<body>
<?php include "../php/header.php";?>
  <div class="header">
    <h1> About Us</h1>
    <p> Fashion Store</p>
  </div>
  <div class="middle">
    <div>
      <p>
        Step into a world of chic designs and unique treasures hand-selected for your closet;
        a world where the hottest trends and timeless styles collide to create an unmatched selection of apparel
        and accessories. Step into Fashion Store!
      </p>
    </div>
    <div>
      <p>
        <br>
        At Fashion Store, our “Style Hunters” have a passion for fashion and are constantly searching to fill our collection
        with a limited selection of unique pieces so that when you buy from Fashion Store,
        you know your individual style will always stand out from the crowd and shine.
        We strive to inspire you with ideas to create your own look with signature items from  Fashion Store.

      </p>
    </div>
    <div>
      <p>
        <br>
        Stop by our store located in Nablus, Palestine to experience Fashion Store in person or browse our
        online collection for both in-store items and our extended collection.
        From dresses to denim to the trendiest accessories, we are constantly replenishing our
        collection– offering styles for every occasion – to keep items fresh and on the
        cutting edge of fashion!
      </p>
    </div>

  </div>
  <div class="botom">

    <p>  Copyright &copy;2020 Fashion Store. All rights reserved.</p>
  </div>

</div>
</body>
</html>
<?php
session_start();
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