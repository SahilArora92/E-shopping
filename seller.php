<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        session_start();
        
        if(empty($_SESSION['username'])||empty($_SESSION['password']))
        {
            header("Location: ErrorPage.php");
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link type =" text/css" rel=" stylesheet" href =" stylesheet.css" /> 
    </head>
    <body style="background-image: url(images/online-happy-hours.jpg)">
        <?php
       // print "WELCOME ".$_COOKIE['name'];
                    if(empty($_COOKIE['name']))
                    {
                        header("Location: Logout.php");
                    }
       // print "hello farmer";
      ?>
        
        <div style="float:right">
            <a href="Logout.php"style="color: black">Logout</a><br>
            <a href="sellerTC.php"style="font-size:20px; color: green; border-color: white;border-width: thick;">See Products...</a>
        </div>
        <form method="post" action="sellerTC.php" enctype="multipart/form-data" name="seller_signup" style='color: whitesmoke'>
                <table align="center" border="0" cellpadding="10" cellspacing="0" width="50%">
                    <tr style='color:black'><td colspan="4" align="center">Welcome <b><?php print $_SESSION['username']?></b></td></tr>
                    <tr><td>Product Name</td><td><input name="Prod_name" type="text" required ></td></tr>
                    <tr><td>Product description</td><td colspan="3"><textarea name="Prod_description" rows="5" cols="30" required ></textarea></td></tr>
                    <tr><td>Quantity</td><td><input type="number" name="quantity" required="true"></td><td></td><td></td></tr>
                    <tr><td>Selling Cost</td><td><input type="number" name="sell_cost" required="true">Rs</td><td></td><td></td></tr>
                    <tr><td>Upload the pic of your product</td><td colspan="4"><input name="pic" type="file" required="true"></td></tr>
                    <tr><td colspan="4" align="center"><input type="submit" value="submit" class='myButton'>
                        </td></tr>
                    <tr><td colspan="4" align="center"><input type="reset" value="reset" class='myButton'>
                        </td></tr>
                </table>
            </form>
        
    </body>
   
</html>
