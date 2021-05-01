<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>header</title>
    <script type="text/javascript" src="../js/home.js"></script>
</head>
<body>
    <div class="containerMenu">
        <nav class="log_header">
            <ul>
                <li id="login" class="border_log">
                    <a onclick="sign_in_clicked()" href="log_in_sign_up.html">SignUp</a>
                </li>
                <li  id="signup">
                    <a onclick="sign_in_clicked()" href="log_in_sign_up.html">LogIn</a>
                </li>
                <li id="logout" style="display: none;">
                    <a onclick="log_out_clicked()" href="index.php">LogOut</a>
                    <input type="hidden" name="logout" value="logout">
                </li>
            </ul>
        </nav>
        <nav class="menu_header">
            <ul>
                <li>
                    <div class="cart_menu">
                        <a id="acart" href="../html/cart.php"><img class="cart_image" src="../image/cart.png"> Cart <?php
                            session_start();
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo '('.$count.')';
                            }
                            else{
                                echo "(0)";
                            }
                            ?> </a>
                    </div>
                </li>
                <li>
                    <a href="contactus.php">Contact Us</a>
                </li>
                <li>
                    <a href="aboutus.php">About Us</a>
                </li>
                <li>
                    <a href="cart.php">Cart</a>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
            </ul>
            <img id="logo" src="../image/LogoIcon.png"/>
        </nav>
        <div class="divider">.</div>
</div>
</body>
</html>
