<?php
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['pass'])
    &&isset($_POST['city'])&&isset($_POST['gender'])&&isset($_POST['address'])&&isset($_POST['birthdate']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $birthdate=$_POST['birthdate'];
    try {
        $db=new mysqli('localhost','root','','fashion');
        $q="INSERT INTO `users` (`fname`, `lname`, `email`, `pass`, `city`, `gender`, `adress`, `birthdate`) VALUES ('$fname', '$lname', '$email', SHA1('$pass'), '$city', '$gender', '$address', '$birthdate');";
        $res=$db->query($q);
        $db->commit();

        if($res==1)
        {
            header('Location:html/log_in_sign_up.html');
        }
        else{
            /*
            echo "<p style='color: red;font-size: 30px'>email is used choice another email</p>";
            echo "<a href='#' style='color: black;text-decoration: none' onclick='javascript:history.go(-1)'> back in login page </a>";
       */
            header('Location:html/signuperroe.html');

        }
        $db->close();
        
    }catch (Exception $e){}
}

?>
