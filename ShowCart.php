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
        $link=  mysql_connect("127.0.0.1:3306","root","root");
       if(isset($link))
       {
           mysql_select_db("e_shop",$link);
           $result=mysql_query("select * from seller where On_Cart='yes' and Status='available'") or die("Query fail");
           if($result>0)
           { $count=0;
            while($row=  mysql_fetch_assoc($result))
                    { ?><div style="width: 1000px; height:300px;">
                <div id="details"><?php
                print "Id: ".$row['id']."<br>";
                 print "Seller: ".$row['username']."<br>";
                  print "Product name: ".$row['Prod_name']."<br>";
                   print "Product description: ".$row['Prod_desc']."<br>";
                   print "SellingCost: Rs".$row['Selling_Cost']."/-<br>";
                    print "Status: ".$row['Status']."<br>";
                $_SESSION['cart'][$count]=$row['id'];
                $count++;
                    ?>
              
                </div>
                    <div class="fruits"><img src="images/<?php print $row['Pic'];?>" width="220" height="220"></div>
                    </div>
              <?php
                
            }?>
                    <button onclick="window.location='productDelivery1.php'">buy</button>
                    <?php $_SESSION['cart_length']=$count;
           }
           else
           {
               print"cart is empty";
           }
          }
        ?>
    </body>
</html>
