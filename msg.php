<?php
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['msg']))

{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];

    try {
        $db=new mysqli('localhost','root','','fashion');
        $q="INSERT INTO `contact_msg` (`name`, `email`, `msg`) VALUES ('$name', '$email', '$msg');";
        $res=$db->query($q);
        $db->commit();
        if($res==1)
        {

            header('Location:html/contactus.php');
        }

        $db->close();

    }catch (Exception $e){}
}

?>

