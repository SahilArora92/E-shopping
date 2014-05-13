<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start();
 if(empty($_SESSION['username'])||empty($_SESSION['password']))
        {
            header("Location: ErrorPage.php");
        }?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        .fruits{
                border-style:solid;
                border-color:#404040;
                border-width:2px;
                padding:0px;
                border-radius: 15%;
                background-color:#404040;
                height:220px;
                width:220px;
                margin:20px;
                float:right;
     }
     #details{
         width:300px;
         float:left;
     }
     body{background-color:#404040;
           color:white;}
        </style>
    </head>
    <body>
        <?php
       $var = $_GET['id'];
       $_SESSION['id']=$var;
       $link=  mysql_connect("127.0.0.1:3306","root","root");
       if(isset($link))
       {
           mysql_select_db("e_shop",$link);
           $result="select * from seller where id='$var'";
           $r=mysql_query($result);
            while($row=  mysql_fetch_assoc($r))
            { ?>
                <div id="details"><?php
                print "Id: ".$row['id']."<br>";
                 print "Seller: ".$row['username']."<br>";
                  print "Product name: ".$row['Prod_name']."<br>";
                   print "Product description: ".$row['Prod_desc']."<br>";
                   print "SellingCost: Rs".$row['Selling_Cost']."/-<br>";
                    print "Status: ".$row['Status']."<br>";
                if($row['Status']=='available')
                {
                    ?>
        <button onclick="window.location='productDelivery.php?id=<?php print $var ;?>'">buy</button>
                <button onclick="window.location='AddToCart.php?id=<?php print $var ;?>'">Add To CART</button>
                </div>
                    <div class="fruits"><img src="images/<?php print $row['Pic'];?>" width="220" height="220"></div>
              <?php
                }
            }
       }
       mysql_close();
        ?>
    </body>
</html>
