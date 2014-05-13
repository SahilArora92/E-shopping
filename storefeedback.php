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
        $name=$_POST['name'];
        $cat=$_POST['category'];
        $commen=$_POST['comment'];
        $link=  mysql_connect("127.0.0.1:3306", "root", "root") or die("Server connection failed");
        if(isset($link))
        {
            mysql_selectdb("e_shop", $link) or die("Database Failed");
            $indicator=  mysql_query("insert into feedback(username,category,comment) values('$name','$cat','$commen')") or die("Please enter a valid username and category...!!!");
            if($indicator>0)
            {
                ?>
        <center><h4>Feedback Stored successfully</h4></center><br>
    
    <?php
            }
            else
            {
                ?>
    <center><h4>Please enter a valid username and category...!!!</h4></center><br>
    
    <?php
            }
        }
        mysql_close();
        
        ?>
    </body>
</html>