<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fashion Store</title>
  <link rel="stylesheet" href="../css/contactus.css"/>
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<?php include "../php/header.php"; ?>

<section class="contact">
  <div class="content">
    <h1> Contact US</h1>
    <p>
      if you have a question , or just want to share your feedback with us
    </p>
  </div>
  <div class="container">
    <div class="contactinfo">
      <div class="box">
        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
        </div>
        <div class="text>">
          <h2>Adress</h2>
          <p> Palestine <br>Nablus</p>
        </div>
      </div>
      <div class="box">
        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
        <div class="text>">
          <h2>TelPhone</h2>
          <p> 09-23-12-790 </p>
        </div>
      </div>
      <div class="box">
        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
        <div class="text>">
          <h2>Email</h2>
          <p> fashion_store@gmail.com </p>
        </div>
      </div>
    </div>
    <div class="contact_form">
      <form method="post" action="../msg.php" enctype="multipart/form-data">
        <h2> Send Message</h2>
        <div class="input_class">
          <input type="text" required name="name">
          <span >Full Name</span>
        </div>
        <div class="input_class">
          <input type="text" required name="email">
          <span >Your Email</span>
        </div>
        <div class="input_class">
          <TEXTAREA name="msg"  required>  </TEXTAREA>
          <span >Type your message..</span>
        </div>
        <div class="input_class">
          <input type="submit"  value="Send">
        </div>
      </form>
    </div>
  </div>
</section>
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