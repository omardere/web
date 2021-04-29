<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion Store</title>
    <link rel="stylesheet" href="../css/contactus.css"/>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        table{
            border: 2px solid red;
            background-color: #ffc;
        }
        th{
            border-bottom: 5px solid #000;

        }
        td{
            border-bottom: 2px solid #666;

        }
    </style>
</head>
<body>
<?php include "../php/AdminHeader.php"; ?>

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
        <div >
            <?php
            $db=new mysqli('localhost','root','','fashion');
            $q="select * from contact_msg";
            $res=$db->query($q);//pointer of rows
            echo "<table>";
            echo "<tr><th>name :</th><th>Email:</th><th>your message:</th></tr>";
            for($i=0;$i<$res->num_rows;$i++) {

                $row = $res->fetch_assoc();//fetch new row
                echo "<tr><td>";
                echo $row['name'];
                echo "</td><td>";
                echo $row['email'];
                echo "</td><td>";
                echo $row['msg'];
                echo "</td></tr>";

            }
            echo "</table>";
            ?>
        </div>
    </div>
</section>
</body>
</html>