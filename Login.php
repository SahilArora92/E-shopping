<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body >
        <?php
        session_start();
        

session_regenerate_id();

        $user=$_POST['username'];
        $pass=$_POST['password'];
        $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($link))
        {
            mysql_select_db("e_shop",$link);
            $resultset=  mysql_query("select category from people where username='$user' and password='$pass'") or die("Query failed");
            $row=mysql_fetch_row($resultset);
            if(empty($row))
            {
                header("Location:ErrorPage.php");
            }
            else
            {
             $resultset=  mysql_query("select category from people where username='$user' and password='$pass'") or die("Query failed");
            while($row=  mysql_fetch_row($resultset))
            {
               if($row[0]=='seller')
               {
                header("Location:seller.php");
                $_SESSION['username']=$user;
                $_SESSION['password']=$pass;
                setcookie('name',$_SESSION['username'],time()+(500));
               }
               else if($row[0]=='buyer')
               {
                   mysql_query("update seller set On_Cart='no'");
                   header("Location:buyerframe.php");
                $_SESSION['username']=$user;
                $_SESSION['password']=$pass;
                setcookie('name',$_SESSION['username'],time()+(500));
               }
               else if($row[0]=='admin')
               {
                   header("Location:Admin.php");
                $_SESSION['username']=$user;
                $_SESSION['password']=$pass;
                setcookie('name',$_SESSION['username'],time()+(500));
               }

            }
        }
        }
        
        ?>
    </body>
</html>
