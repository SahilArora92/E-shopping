<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
      $var = $_GET['id'];
       $_SESSION['id_cart']=$var;
       $link=  mysql_connect("127.0.0.1:3306","root","root");
       if(isset($link))
       {
           mysql_select_db("e_shop",$link);
           $result=mysql_query("update seller set On_Cart='yes' where id='$var' and On_Cart='no' and Status='available'") or die("Query fail");
         if($result)
           print "added to cart";
       }else 
           print "not added to cart";
        ?>
    </body>
</html>
