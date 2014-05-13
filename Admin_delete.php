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
       <link type ="text/css" rel="stylesheet" href ="adminStyle.css" /> 
    </head>
    <body>
        <?php
                 if(empty($_COOKIE['name']))
                    {
                        header("Location: Logout.php");
                    }
      ?>
    <center><h1>Welcome admin</h1></center>
    <div style="float:right">
            <a href="Logout.php">Logout</a><br>
            <a href="Admin.php">Approve</a>
        </div>
    <hr>
    <form  method="POST" action="Admin1.php">
    <table name="info" align="center" border="1" bgcolor="lavender" cellpadding="15"  width="50%" style="border-collapse: collapse">
        <caption>Select the people to be deleted</caption>    
        <tr><th>Username</th><th>Password</th><th>Name</th><th>Gender</th><th>Category</th><th>Age</th><th>Contact no</th><th>Email-id</th><th>Address</th><th>Pincode</th><th>Select</th></tr>
          <?php
           
        $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($link))
        {
            mysql_select_db("e_shop",$link);
            $resultset=  mysql_query("select * from people where category='seller' or category='buyer'") or die("Query failed");
            while($row=  mysql_fetch_assoc($resultset))
            {
                       
         
       print "<tr>";
      
          foreach($row as $val)
          {   
              ?><td><?php print $val;?></td><?php
          }
          ?>
            <td><input type="checkbox" name="del[]" value="<?php print $row['username'];?>"></td>
              
              <?php
          print "</tr>";
      }
         
        }
      
        ?></table>
        <hr>
        <center>
        <input type="submit" value="delete" name="submit">
        <input type="reset" value="reset" name="reset"></center>
       
    </form>
     <?php       
     
     mysql_close();?>
    </body>
</html>
