<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="../js/AdminHome.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/AdminHome.css">
    <link rel="stylesheet" href="../css/order.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../css/chart.css" type="text/css" rel="stylesheet">
    <style>
        table{
            border: 2px solid red;
            background-color: #ffc;
        }
        th{
            padding: 10px 10px;
            border-bottom: 5px solid #000;

        }
        td{
            text-align: center;
            padding: 10px 10px;
            border-bottom: 2px solid #666;

        }
    </style>
</head>
<body>
<?php include "../php/AdminHeader.php";?>
<?php
$dateArray = array();
$priceArray = array();
$orderarray = array("January" => 0, "February" => 0, "March" => 0, "April" => 0, "May" => 0, "June" => 0, "July" => 0 ,"August" => 0 ,"September" => 0 ,"October" => 0 ,"November" => 0, "December" => 0);
$db = new mysqli('localhost', 'root', '', 'fashion');
$q1="select dates from user_order";
$q = "select price from user_order, item where user_order.item_id = item.id";
$res = $db->query($q);//pointer of rows
$res22 = $db->query($q1);
$i =0;
while($row = $res->fetch_assoc()){
    $row22 = $res22->fetch_assoc();
    $price = $row['price'];
    $month=$row22['dates'];
    $year1 =  strtotime($month); // July
    $y = date("Y",$year1);
    echo $_POST['year'];
    if ($_POST['year'] == $y) {
        $month1 = strtotime($month); // July
        $m = date("F", $month1);
        $orderarray[$m] += $price;
    }
}
$db->close();
$dates = "";
$prices = "";
foreach ($orderarray as $key => $value){
    $dates = $dates . "'$key'" . ",";
    $prices = $prices . "'$value'" . ",";
}
$dates = substr($dates, 0, -1);
$prices = substr($prices, 0, -1);
?>


<section  class="contact" style="top: 15%;right: 25%;">
        <div style="display: flex; position: relative; flex-flow: column; text-align: center; width: 400px; height: 100px ">
            <form action="order.php" method="post">
                <h5 style="position: absolute; right: 0px; top: 10px; color: #51351e; cursor: pointer;"> Submit the Year Before Show the Chart:</h5>
                <input type="submit" style="position: absolute; right: 0px; top: 50px; color: #51351e; cursor: pointer;" >
                <input id="year" name="year" type="text"  placeholder="Year" style="position: absolute; right: 50px; top: 50px; color: #51351e; cursor: pointer; ">
                <button type="button"  name="shw" style="position: absolute; right: 0; top:80px; width: 100px; height: 50px; border-radius: 20px; background-color: #faaf8f; color: #51351e; cursor: pointer; " onclick="showpopup(<?php echo $dates;?>, <?php echo $prices;?>)">Show Chart</button>
            </form>
        </div>
    <h1 style="margin: 20px 0">Orders</h1>
            <?php
            $db=new mysqli('localhost','root','','fashion');
            $q1="select quantity ,dates ,id, price,email, city, adress from user_order, users, item where (user_order.user_email = users.email AND user_order.item_id = item.id) order by dates DESC;";
            $res1 = $db->query($q1);
            echo "<table>";
            echo "<tr><th>Email:</th><th>City:</th><th>Adress:</th><th>Item ID:</th><th>Item Price:</th><th>Item quantity:</th><th>Date:</th></tr>";
            for($i=0;$i<$res->num_rows;$i++) {
                $row1 = $res1->fetch_assoc();
                echo "<tr><td>";
                echo $row1['email'];
                echo "</td><td>";
                echo $row1['city'];
                echo "</td><td>";
                echo $row1['adress'];
                echo "</td><td>";
                echo $row1['id'];
                echo "</td><td>";
                echo $row1['price'];
                echo "</td><td>";
                echo $row1['quantity'];
                echo "</td><td>";
                echo $row1['dates'];
                echo "</td><td>";
                echo "";
                echo "</td></tr>";
            }
            echo "</table>";
            ?>
</section>
<div class="popup_background" id="popup_background">
    <div style="right: 600px; top: 150px; position: absolute; cursor: pointer;" onclick="hidepopup()"><h1 style="color: white;">×</h1></div>
    <div class="Chart_Container" id="Chart_Container">
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
            function showpopup($dates, $prices){
                document.getElementById('popup_background').style.display = "block";
                var txt = document.getElementById("year").value;
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php echo $dates;?>],
                        datasets: [{
                            label: 'Sales per Year: '+txt,
                            data: [<?php echo $prices;?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
            function hidepopup(){
                document.getElementById('popup_background').style.display = "none";
            }
        </script>
    </div>
</div>
</body>
</html>
