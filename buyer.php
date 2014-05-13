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
    </head>
    <body>
        <?php
        
                    if(empty($_COOKIE['name']))
                    {
                        header("Location: Logout.php");
                    }
        
        ?>
        <center><h5><?php print "WELCOME ".$_COOKIE['name'];?></h5></center>
    <div style="float:right">
            <a href="Logout.php">Logout</a>
            <a href="buyer.php">Reload</a><br>
            <a href="ShowCart.php" target="Transaction"><img src="images/shopping_cart.png?>" width="60" height="60"></a>
        </div>
    
    <form method="post" action="buyerTC.php"  target="Transaction" name="buyer_signup">
                <table align="center" border="0" bgcolor="lavender" cellpadding="10" cellspacing="0" width="50%">
                    
                    <tr><td>Select price range</td><td><select name="Price_range">
                        
                                <option value="1">0-1000</option>
                                <option value="2">1000-10000</option>
                                <option value="3">10000-50000</option>
                                <option value="4">50000-100000</option>
                                <option value="5">100000+</option>
                                </td>
                    <tr><td colspan="2" align="center"><input type="submit" value="submit"><input type="reset" value="reset">
                        </td>
                    </tr>
                </table>
            </form>
    </body>
</html>
