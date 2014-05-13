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
        <link type =" text/css" rel=" stylesheet" href =" stylesheet.css" /> 
    </head>
    <body style="background-color: #404040;">
       
        <div style="float:right">
            <a href="Logout.php">Logout</a><br>
            <a href="seller.php">Add Products</a>
        </div>
        <?php
        session_start();
        $user=$_SESSION['username'];
        $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($_POST['Prod_name']))
        { $prod=$_POST['Prod_name'];
        $desc=$_POST['Prod_description'];
        $quant=$_POST['quantity'];
        $sell_cost=$_POST['sell_cost'];
        move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);
        $pic=$_FILES['pic']['name'];
        
        
        }
        if(isset($link))
        {
            mysql_select_db("e_shop",$link);
            if(isset($_POST['Prod_name']))
            $resultset=  mysql_query("insert into seller(username,Prod_name,Prod_desc,Quantity,Selling_Cost,Pic) values('$user','$prod','$desc','$quant','$sell_cost','$pic')") or die("Query failed");
            
            $sh=mysql_query("select * from seller where username='$user'") or die("Query Fail");
            echo "<table name='info' align='center' border='1' bgcolor='lavender' cellpadding='15'  width='50%' style='border-collapse: collapse'>
            <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Quantity</th>
            <th>Selling Cost</th>
            <th>Admin Approval</th>
            <th>Status</th>
            <th>Pic</th>
            
            </tr>";
            while($row=  mysql_fetch_assoc($sh))
            {
                 echo "<tr>";
                  
                    print "<td><b>".$row['id']."</b></td>";
                     print "<td><b>".$row['username']."</b></td>";
                     print "<td><b>".$row['Prod_name']."</b></td>";
                     print "<td><b>".$row['Prod_desc']."</b></td>";
                     print "<td><b>".$row['Quantity']."</b></td>";
                     print "<td><b>Rs".$row['Selling_Cost']."/-</b></td>";
                     print "<td><b>".$row['Admin_approv']."</b></td>";
                     print "<td><b>".$row['Status']."</b></td>";
                     ?>
    <td><img src="images/<?php print $row['Pic'];?>" width="220" height="220"></td>
                    <?php
                echo "</tr>";
                
            }
            
        }
           
        
    
    mysql_close()?>
        </body>
</html>
