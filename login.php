<?php
session_start();
if(isset($_POST['email'])&&isset($_POST['pass']))
{
    $not=0;
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    try {
        $db=new mysqli('localhost','root','','fashion');
        $q="select * from users";
        $res=$db->query($q);//pointer of rows
        for($i=0;$i<$res->num_rows;$i++)
        {

            $row= $res->fetch_assoc();//fetch new row
            if($row['email']==$email&&($row['pass']==sha1($pass)))
            {
                if(($row['email']=='fashion_store@gmail.com')&&($row['pass']==sha1('admin')))
                {
                    header('Location:html/AdminHome.php');
                    $not=0;
                    break;
                }
                $_SESSION['User'][0] = array('email'=>$row['email'], 'city'=>$row['city'], 'adress'=>$row['adress']);
                echo "<script>window.location = 'html/index.php';</script>";
                $not=0;
                break;
            }
            else{
                $not=1;
            }

        }

        $db->close();

        if($not==1)
        {
            header('Location:html/loginerrore.html');

            /*
            echo "<p style='color: red;font-size: 30px'>email or passowrd are not correct</p>";
            echo "<a href='#' style='color: black;text-decoration: none' onclick='javascript:history.go(-1)'> back in login page </a>";

*/
        }

    }catch (Exception $e){}
}

?>
