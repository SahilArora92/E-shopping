<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $user=$_SESSION['username'];
       // $message='';
       // $from='';
        $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($link))
        { 
            mysql_select_db("e_shop",$link);
             $var1 = $_SESSION['id'];
             $q1=mysql_query("select Prod_name,Prod_desc,Selling_Cost,Pic from seller where id='$var1'") or die("query fail 1");
             while($row= mysql_fetch_row($q1))
        {
                 mysql_query("insert into buyer(Prod_name,Prod_desc,Cost,Pic,username) values ('$row[0]','$row[1]','$row[2]','$row[3]','$user')")or die("q 2 fail");
          //$message="Product Name: ".$row[0]."<br> Product Description: ".$row[1]."<br> Cost: ".$row[2]."<br>";
             }
            
            mysql_query("update seller set Quantity=0,Status='not avaiable' where id ='$var1' and Quantity=1");
             
             
             
            mysql_query("update seller set Quantity=Quantity-1 where id ='$var1' and Quantity>1");
             
             
    
            $p=mysql_query("select * from people where username='$user'");
        while($row=  mysql_fetch_assoc($p))
        {
        
            ?><pre>
        <div >
            <h2>Transaction Successful</h2>
            <h3>Product to be delivered at :-</h3><br>
            name:             <?php print $row['name'];?><br>
            address:          <?php print $row['address'];?><br>
            pincode:          <?php print $row['pincode'];?><br>
            contact number:   <?php print $row['contact_no'];?><br>
            email-id:          <?php print $row['email_id'];?>
        </div></pre>
        <?php 
        //$from=$row['email_id'];
        }
       // $subject = "Product sold";
   
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    //$message = wordwrap($message, 70);
    // send mail
   // ini_set('SMTP', "sahil.arora2011@vit.ac.in");
    //ini_set('smtp_port', "25");
    //ini_set('sendmail_from', $from);
    //mail("sahil.arora2011@vit.ac.in",$subject,$message,"From: $from\n");
    echo "Thank you for purchasing";
    mysql_query("update seller set On_Cart='no'");
        }
        
        mysql_close();
        ?>
        
    </body>
</html>
