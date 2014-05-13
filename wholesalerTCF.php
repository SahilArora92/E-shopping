<?php session_start();?>
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
    <body>
        <?php
        $farmer=$_POST['del'];
         $veg=$_SESSION['veg'];
           $grade=$_SESSION['grade'];
           $quan=$_SESSION['quantity'];
           $cp=$_SESSION['cost'];
           $wholesaler=$_COOKIE['name'];
        $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($link))
        {
            mysql_select_db("e_bazaar",$link);
            $resultset_f= mysql_query("select Pic from farmer where username='$farmer' and Veg_name='$veg' and Grade='$grade' and Quantity >= $quan ;");
            while($row=  mysql_fetch_row($resultset_f))
            { 
                $pic=$row[0];
            }
            $resultset_w=  mysql_query("insert into wholesaler(username,Veg_name,Grade,Quantity,Cost_Price,Pic,Seller) values('$wholesaler','$veg','$grade','$quan','$cp','$pic','$farmer')") or die("Query failed");
            
            $q="update farmer set Quantity=Quantity-$quan,Selling_Cost=Selling_Cost-$cp where username='$farmer' and Veg_name='$veg' and Grade='$grade' and Quantity >= $quan ; ";
            mysql_query($q);
            mysql_query("delete farmer where Quantity=0;");
            print "Successful upload<br>";
            $sh=mysql_query("select * from wholesaler where username='$wholesaler'") or die("Query Fail");
            while($row=  mysql_fetch_row($sh))
            {
                foreach($row as $val)
                {   
                    print "<b>".$val."</b><br>";
                }
                print "<br>";
                
            }
        }
        
        ?>
    </body>
</html>
